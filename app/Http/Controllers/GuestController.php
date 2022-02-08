<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class GuestController extends Controller
{
    public function home(){
        $posts = Post::all(); 
        $tags = Tag::all();
         return view('pages.home',compact('posts','tags'));
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.createPost',compact('categories', 'tags'));
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

        $tags = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> attach($tags);
        $post -> save();
        return redirect() ->route('home');
    }
 
}
