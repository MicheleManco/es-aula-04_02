<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class GuestController extends Controller
{
    public function home(){
        $posts = Post::all(); 
         return view('pages.home',compact('posts'));
    }

    public function create(){
        return view('pages.createPost');
    }

    public function store(Request $request){
        $data = $request -> validate([
            'title'=> 'required|string|max:255',
            'author'=> 'required|string|max:255',
            'subtitle'=> 'string|max:255',
            'text'=> 'required|string|max:255',
            'date'=> 'required|date'
        ]);

        $post = Post::create($data);
        return redirect() ->route('home');
    }
 
}
