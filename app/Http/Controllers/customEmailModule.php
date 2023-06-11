<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customEmailModule extends Controller
{
    public function updateCourseEmailView(){
        return view('update-email');
    }

    public function updateCourseEmailPost(Request $request) {
        $existingCourse = DB::table('customEmailTemplates')->where('course_id',$request['courseId'])->get()->toArray();

        if($existingCourse) {
            DB::table('customEmailTemplates')->where('course_id',$request['courseId'])->update(
                array(
                    'course_id' =>$request['courseId'],
                    'email_date' => $request['courseDate'],
                )
            );
        }else {
            DB::table('customEmailTemplates')->insert(
                array(
                    'course_id' =>$request['courseId'],
                    'email_date' => $request['courseDate'],
                )
            );
        }


    }

    public function getCourseForEmail() {

    }
}
