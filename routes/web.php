<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage', ['title'=>'Homepage']);
});

Route::get('/login', function () {
    return view('login',['title'=>'Login Page']);
});

Route::get('/index', function () {
    return view('index',['title'=>'Index']);
});