<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;

use DB;

class adminSectionController extends Controller
{


    public function edit(){
//        if( auth()->user()->id ==  1 ){
//            return view('edit');
//
//        }else{
            return view('edit');
//        }

    }



    public function studentSearch(Request $request){

          $name = $request->all();
             $search = $name['search'];
             $tablemessage = 'This is Student results below';
             if ($tablemessage)
        if ( $search ){
                 $result = User::where('name', 'like', '%' . $search . '%')
                     ->orWhere('id', 'like', '%' . $search . '%')
                     ->get();

                 echo json_encode($result) ;
             }



    }
}
