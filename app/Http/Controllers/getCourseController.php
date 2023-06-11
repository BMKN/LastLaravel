<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;
use DB;

class getCourseController extends Controller
{
    public function getCourses(){
         $courses = DB::table('course')->get()->toArray();

        return view('home')->with('courses', $courses);
    }

    public function showCourseUrl($id){
        $courseUrl = courses::find($id);
        return view('course')->with('courseUrl', $courseUrl);

    }

}
