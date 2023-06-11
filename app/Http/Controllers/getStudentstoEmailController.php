<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class getStudentstoEmailController extends Controller
{
    public function getStudents(){
        return view('email-mass');
    }

    public function showStudentsEmails(Request $request){
        $data =   $request->all();

        if ($data) {
            $course = $data['courseSelectName'];
            $students = DB::table('users')
                ->join('course','users.courseModule','course.name')
                ->where('course.id',$course)->get()->toArray();

            echo json_encode($students);

        }
    }
}
