<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Mail\sendSumupLink;
use Mail;

class getSumupCheckoutId extends Controller
{

    public function returnSumUp() {
        return view('create-sumup-link');
    }
    public function getStudentId(Request $request) {
        $data = $request->all();
        $student = User::find($data['id']);
        $mailData = [
            "clientId" => $student->sumUpId
        ];


        Mail::to($student->email)->send(new sendSumupLink($mailData));


    }
}
