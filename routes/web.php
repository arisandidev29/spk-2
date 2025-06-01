<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', function() {
    return view('register');
});

// User

Route::controller(UserController::class)->group(function() {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/doLogin', 'doLogin')->name('doLogin')->middleware('guest');
    Route::get('/register','register')->name('register')->middleware('guest');
    Route::post('/doRegister','doRegister')->name('doRegister')->middleware('guest');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    
});

Route::get('/homepage', function() {
    return view('user.homepage');
})->name('homepage')->middleware(['auth',UserMiddleware::class]);

Route::get('/user/question', function() {
    return view('user.question');
})->name('question')->middleware(['auth',UserMiddleware::class]);

// admin

Route::get('/dashboard', function() {
    return view('admin.dashboard');
})->name('dashboard')->middleware(['auth',AdminMiddleware::class]);

Route::get('/users',function() {
    return view('admin.user');
})->name('users')->middleware(['auth',AdminMiddleware::class]);

Route::get('/kriteria', function() {
    return view('admin.kriteria');
})->name('kriteria');


Route::get('/bobot', function() {
    return view('admin.bobot');
})->name('bobot');

Route::get('/alternative', function() {
  return view('admin.alternative'); 
})->name('admin.alternative');