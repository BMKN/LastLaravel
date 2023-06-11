<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewRegHome extends Controller
{
    public function showRegHome() {
        return view('/auth/register');
    }
}
