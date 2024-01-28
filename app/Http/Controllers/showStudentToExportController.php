<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class showStudentToExportController extends Controller
{
    public function getCourseName(Request $request){
            return view('student-export');
    }
    public function getStudentsToExport(Request $request){
        $data =   $request->all();


        if ($data) {
            $course = $data['courseSelectName'];
            $students = DB::table('users')->where('courseModule', $course)->get()->toArray();
            echo json_encode($students);

        }
    }
}
