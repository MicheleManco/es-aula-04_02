@extends('layouts.main-layout')
@section('content')
@guest
    

<form method="POST" action="{{ route('register') }}">
    @method('post')
    @csrf
    <label for="name">name</label>
    <input id="name" type="text" name="name">

    <label for="email">Email</label>
    <input id="email" type="email"  name="email">

    <label for="password">password</label>
    <input id="password" type="password" name="password">

    <label for="password-confirm">conferma password</label>
    <input id="password-confirm" type="password" name="password_confirmation">

    <button type="submit" class="btn btn-primary">Register</button>
</form> 

<br>
<hr>
<br>

<form method="POST" action="{{ route('login') }}">
    @method('post')
    @csrf
    <label for="name">name</label>
    <input id="name" type="text" name="name">

    <label for="email">Email</label>
    <input id="email" type="email" name="email">

    <label for="password">password</label>
    <input id="password" type="password" name="password">

    <button type="submit" class="btn btn-primary">login</button>
</form> 


@else 

<h2>{{ Auth::user() -> name }}</h2>
<a class="btn btn-secondary" href="{{ route('logout') }}">LOGOUT</a>
<br>
<br>
<hr>
<br>
<a href="{{route('create')}}">create new</a>

@foreach ($posts as $post) 
<li>
    <a href="{{ route('home', $post -> id )}}"></a> 

    {{$post -> title}}
    
    <br> 

    {{$post -> text}} - {{$post -> author}} <br>
    {{$post-> date}} - {{$post->category->name}} - Tags: 

    @foreach ($post->tags as $tag)
    {{$tag ->name}}
    @endforeach
    <br>
    <a class="btn btn-secondary" href="{{route('edit', $post -> id)}}">EDIT</a>
    <a class="btn btn-danger" href="{{route('delete', $post -> id)}}">DELETE</a>
    <br>
    <br>
</li> 
@endforeach 

@endguest
@endsection