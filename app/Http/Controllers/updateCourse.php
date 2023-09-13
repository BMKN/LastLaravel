<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\courses;
use DB;

class updateCourse extends Controller
{
    public function updateCourse(Request $request) {
        $data = $request->all();
        $course = DB::table('course')->where('name' ,$data['courseName'])->get()->toArray();

        $course = courses::find($course[0]->id);
        $course->name = $data['courseName'];
        $course->subject = $data['courseSubject'];
        $course->content = $data['courseContent'];
        $course->save();

        echo json_encode($data);
    }
}
