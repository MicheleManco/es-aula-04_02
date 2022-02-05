@extends('layouts.main-layout')
@section('content')
@guest
    

<form method="POST" action="{{ route('register') }}">
    @method('post')
    @csrf
    <label for="name">name</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

    <label for="email">Email</label>
    <input id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email">

    <label for="password">password</label>
    <input id="password" type="password" name="password" required autocomplete="new-password">

    <label for="password-confirm">conferma password</label>
    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

    <button type="submit" class="btn btn-primary">Register</button>
</form> 

<br>
<hr>
<br>

<form method="POST" action="{{ route('login') }}">
    @method('post')
    @csrf
    <label for="name">name</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

    <label for="password">password</label>
    <input id="password" type="password" name="password" required autocomplete="new-password">

    <button type="submit" class="btn btn-primary">login</button>
</form> 


@else 

<h2>{{ Auth::user() -> name }}</h2>
<a class="btn btn-secondary" href="{{ route('logout') }}">LOGOUT</a>



{{-- lista dei film --}}

@endguest
@endsection