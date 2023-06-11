<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;



class showStudentController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function showStudent(){

        return view('showStudent');

    }
    public function returnStudentInfo(Request $request){
            $id = $request->all();
            $idTerm = $id['id'];
            $result = User::where('id', '=', $idTerm)->get()->toArray();
            echo json_encode( $result );

    }
}
