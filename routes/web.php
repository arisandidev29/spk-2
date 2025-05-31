<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


Route::get('/register', function() {
    return view('register');
});

// User


Route::get('/homepage', function() {
    return view('user.homepage');
});

Route::get('/user/question', function() {
    return view('user.question');
});

// admin

Route::get('/dashboard', function() {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/users',function() {
    return view('admin.user');
})->name('users');

Route::get('/kriteria', function() {
    return view('admin.kriteria');
})->name('kriteria');


Route::get('/bobot', function() {
    return view('admin.bobot');
})->name('bobot');