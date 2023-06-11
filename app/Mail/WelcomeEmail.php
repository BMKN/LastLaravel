<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use DB;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param  $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $emailTemplate = DB::table('customEmailTemplates')
            ->join('course','customEmailTemplates.course_id','course.id')
            ->where('course.name',$this->user->courseModule)
            ->get()->toArray();


        $mailData = [
            "emails" => $emailTemplate,

        ];
        return $this->from('Registration@last-ireland.org','BMKN')
            ->subject('')
            ->view('emails.welcome')
            ->with('data',$mailData);
    }
}
