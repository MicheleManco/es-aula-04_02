@extends('layouts.main-layout')
@section('content')

<h1>create your post</h1>
<form action="{{route('store')}}" method="POST">

    @method('post')
    @csrf

    <label for="title">Titolo</label>
    <input type="text" name="title">
    <br>
    <label for="subtitle">Sottotitolo</label>
    <input type="text" name="subtitle">
    <br>
    <label for="text">Testo</label>
    <textarea name="text"  cols="30" rows="10"></textarea>
    <br>
    <label for="author">Autore</label>
    <input type="text" name="author">
    <br>
    <label for="date">data</label>
    <input type="date" name="date">
    <br>

    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category -> id }}">{{$category -> name}}</option>
        @endforeach
    </select>
    <br>
    @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{$tag -> id}}">{{$tag -> name}} <br>
    @endforeach

    <button type="submit" class="btn btn-primary">CREATE</button>    
</form>
    
@endsection