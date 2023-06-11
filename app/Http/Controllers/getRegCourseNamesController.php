<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class getRegCourseNamesController extends Controller
{
    public function getCourseNamesReg(){
        $regCourses = DB::table('course')->get()->toArray();

        return view('/auth/register')->with('regCourses', $regCourses);
    }
}
