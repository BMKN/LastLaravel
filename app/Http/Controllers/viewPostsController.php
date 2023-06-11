<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewPostsController extends Controller
{
    public function viewPosts(){
        $posts = DB::table('post')->get()->toArray();

        return view('viewPosts')->with('posts', $posts);
    }
}
