<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'GuestController@home')->name('home');
Route::get('/logout', 'Auth\LoginController@logout') ->name('logout');

Route::post('/register', 'Auth\RegisterController@register') ->name('register');
Route::post('/login', 'Auth\LoginController@login') ->name('login');

Route::get('/create', 'GuestController@create') ->name('create');
Route::post('/store', 'GuestController@store')->name('store');




