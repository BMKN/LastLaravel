<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;


class searchCourses extends Controller
{
    public function searchCoursesView() {
        return view ('course-search');

    }

    public function searchCourses(Request $request) {
        $data =   $request->all();
        $courses = DB::table('course')->where('name','like','%'.$data['courseName'].'%')->get()->toArray();
        echo json_encode($courses);
    }
//
    public function updateCourse(Request $request) {
        $data =   $request->all();
    }
}
