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

       
        $post = Post::make($data);

        $category = Category::findOrFail($request ->get('category_id'));
        $post -> category() -> associate($category);
        $post -> save();

        $tags = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> attach($tags);
        $post -> save();

        return redirect() ->route('home');
    }

    public function edit($id){
        $categories = Category::all();
        $tags = Tag::all();
        
        $post = Post::findOrFail($id);
        

        return view('pages.editPost' , compact('tags', 'categories', 'post'));
    }

    public function update(Request $request , $id){
        $data = $request -> validate([
            'title'=> 'required|string|max:255',
            'author'=> 'required|string|max:255',
            'subtitle'=> 'string|max:255',
            'text'=> 'required|string',
            'date'=> 'required|date'
        ]);

        $post = Post::findOrFail($id);
        $post-> update($data);

        $category = Category::findOrFail($request ->get('category_id'));
        $post -> category() -> associate($category);
        $post -> save();

        $tags = Tag::findOrFail($request -> get('tags'));
        $post -> tags() -> sync($tags);
        $post -> save();

        return redirect() ->route('home');
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $post -> tags() -> sync([]);
        $post -> save();
        $post -> delete();
        return redirect()-> route('home');
    }
 
}
