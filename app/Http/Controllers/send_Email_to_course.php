<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\massEmail;


class send_Email_to_course extends Controller
{
    public function sedCourseEmailView(){
        return view('sendCourseEmail');
    }

    public function sendMassCourseEmail(Request $request){
            $data = $request->all();
                    $emailTemplate = DB::table('customEmailTemplates')->where('course_id',$data['courseId'])
                        ->join('course','customEmailTemplates.course_id','course.id')
                       ->get()->toArray();
            $mailData = [
             "emails" => $data['emails'],
              "date" =>  $emailTemplate[0]->email_date,
                "name" =>  $emailTemplate[0]->name
        ];

                foreach($data['emails'] as $email) {
                         Mail::to($data['emails'])->send(new massEmail($mailData));

                    }

    }

}
