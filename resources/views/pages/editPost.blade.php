@extends('layouts.main-layout')
@section('content')
<h1>update post</h1>
<form action="{{route('update', $post ->id)}}" method="POST">

    @method('post')
    @csrf

    <label for="title">Titolo</label>
    <input type="text" name="title" value="{{ $post -> title}}">
    <br>
    <label for="subtitle">Sottotitolo</label>
    <input type="text" name="subtitle"value="{{ $post -> subtitle}}">
    <br>
    <label for="text">Testo</label>
    <textarea name="text"  cols="30" rows="10">{{ $post -> text}}</textarea>
    <br>
    <label for="author">Autore</label>
    <input type="text" name="author" value="{{ $post -> author}}">
    <br>
    <label for="date">data</label>
    <input type="date" name="date" value="{{ $post -> date}}">
    <br>

    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category -> id }}"
                @if ($category ->id == $post -> category -> id)
                    selected
                @endif
            >{{$category -> name}}</option>
        @endforeach
    </select>
    <br>
    
    @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{$tag -> id}}"

            @foreach ($post -> tags as $postTag)

                @if ($tag -> id == $postTag ->id)
                    checked
                @endif

            @endforeach

        >{{$tag -> name}} <br>
    @endforeach

    <button type="submit" class="btn btn-primary">UPDATE</button>    
</form>
    
@endsection