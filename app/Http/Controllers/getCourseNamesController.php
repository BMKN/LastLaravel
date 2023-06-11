<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class getCourseNamesController extends Controller
{

    public function getCourseNames(){
        $coursesNames = DB::table('course')->get()->toArray();

        return view('edit')->with('coursesNames', $coursesNames);
    }
    public function getCourseNamesReg(){
        $regCourses = DB::table('course')->get()->toArray();

        return view('/auth/register')->with('regCourses', $regCourses);
    }

    public function getCourseNameHomes(){
        $coursesNames = DB::table('course')->get()->toArray();

        return view('/home')->with('coursesNames', $coursesNames);
    }
}
