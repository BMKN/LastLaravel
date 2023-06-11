<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class sendStudentSMSController extends Controller
{

    public function returnInfo(){
        return view('send-sms');
    }

    public function sendSms(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $smsbody = $data['smsbody'];
        $studentsubject = $data['studentsubject'];
        $mobile = $data['mobile'];
        // Authorisation details.
        $username = "briannowlan@ymail.com";
        $hash = "98219d896fd9b5be10a20ffcc503e0215c68f0ca";

        // Config variables. Consult http://api.txtlocal.com/docs for more info.
        $test = "0";

        // Data for text message. This is the text message data.
        $sender = "Last-Ireland"; // This is who the message appears to be from.
        $numbers = $mobile; // A single number or a comma-seperated list of numbers
        $message = $smsbody;
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('https://api.txtlocal.com/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API

    }
}
