<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class   postsController extends Controller
{
    public function createPost(Request $request){

        $data = $request->all();
        DB::table('posts')->insert(
            array(
                'name' =>$data['postName'],
                'subject' => $data['subjectPost'],
                'content' => $data['contentPost'],
            )
        );
    }

}
