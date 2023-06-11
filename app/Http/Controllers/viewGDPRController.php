<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewGDPRController extends Controller
{
    public function showGDPR (){
        return view('GDPR');
    }
}
