<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class unUnuthorisedUserHome extends Controller
{
    public function __construct()
    {
     //   $this->middleware('auth');
    }
    public function showGuestHome(){
        return view('home-guest');
    }
    public function courses() {

        $courses =  DB::select("SELECT * from customEmailTemplates
                    Join course on customEmailTemplates.course_id = course.id
                    where customEmailTemplates.email_date >= CURDATE()");

                    return view('home-guest')->with('courses', $courses);

    }
}
