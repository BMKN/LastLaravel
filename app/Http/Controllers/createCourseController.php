<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon;

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
                'courseDate' =>  $data['subjectDate'],//Carbon::parse($data['subjectDate']),
//                'created_at' => $data['subjectDate'],
                'dd-M-YYYY' => '00:00:00',
                'price' => 0,
                'URL'=> url('/course/'),

            )
        );


    }
}


