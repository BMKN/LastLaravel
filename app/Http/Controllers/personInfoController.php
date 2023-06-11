<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class personInfoController extends Controller
{
        public  function showPersonalInfo(){
            $user = Auth::user();
            return view('personalInfoedit')->with('user',$user);

        }

        public function editStudentInfo(Request $request){
            $data = $request->all();
            $id = $data['id'];
            $Student = User::find($id);
            $Student->email = $data['email'];
            $Student->addressLine1 = $data['addressLine1'];
            $Student->addressLine2 = $data['addressLine2'];
            $Student->eirCode = $data['eirCode'];
            $Student->save();


            echo json_encode( $Student );

        }
}
