<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class getStudentSmsInfoController extends Controller
{
    public function returnSmsInfo(){
        return view('sms-info');
    }
    public function getStudentSmsInfo (Request $request){
        $data = $request->all();
        $id = $data['id'];
        $smsbody = $data['smsbody'];
        $studentsubject = $data['studentsubject'];
        $Student = User::find($id);
        echo json_encode( $Student);
    }

}
