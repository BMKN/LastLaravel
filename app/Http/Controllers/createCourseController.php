<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class createCourseController extends Controller
{
    public function createCourseView(){
        return view('view-course');
    }
    public function createCourse(Request $request){

        $data = $request->all();

        DB::table('course')->insert(
            array(
                'name' =>$data['courseName'],
                'subject' => $data['subjectCourse'],
                'content' => $data['subjectCourse'],
                'price' => 0,
                'URL'=> url('/course/'),

            )
        );


    }
}


