<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class GuestController extends Controller
{
    public function home(){
        $posts = Post::all(); 
         return view('pages.home',compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        return view('pages.createPost',compact('categories'));
    }

    public function store(Request $request){
        $data = $request -> validate([
            'title'=> 'required|string|max:255',
            'author'=> 'required|string|max:255',
            'subtitle'=> 'string|max:255',
            'text'=> 'required|string',
            'date'=> 'required|date'
        ]);

        $category = Category::findOrFail($request ->get('category_id'));
        $post = Post::make($data);

        $post -> category() -> associate($category);
        $post -> save();

        $post = Post::create($data);
        return redirect() ->route('home');
    }
 
}
