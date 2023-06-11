<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\courses;
use DB;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $user = Auth::user();



        if ( $user->id  == 5 ) {// do your magic here
            return view('edit');
        }else{
            return view('studentportalLogin')->with('user', $user);

        }


    }

//    public function courses() {
//        $courses = DB::table('course')->get()->toArray();
//        return view('home')->with('courses', $courses);
//    }


}
