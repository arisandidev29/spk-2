<?php

use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', function() {
    return view('register');
});


Route::prefix('/profile')->group(function() {
    Route::get('/view',[UserController::class,'profile'])->name('profile.view');
    Route::put('/edit',[UserController::class,'updateProfile'])->name('profile.edit');
});

// User

Route::controller(UserController::class)->group(function() {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/doLogin', 'doLogin')->name('doLogin')->middleware('guest');
    Route::get('/register','register')->name('register')->middleware('guest');
    Route::post('/doRegister','doRegister')->name('doRegister')->middleware('guest');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    
});

Route::controller(UsersController::class)->group(function() 
{
    Route::get('/user/homepage', 'show')->name('user.homepage')->middleware(['auth',UserMiddleware::class]);
    Route::get('/user/result','result')->name('user.result')->middleware(['auth',UserMiddleware::class]);
    Route::delete('/user/result/delete','delete')->name('user.result.delete');
});



Route::controller(questionController::class)->group(function() {
    Route::get('/user/question','view')->name('question');
    Route::post('/user/question/create','create')->name('question.create');
});

// admin

Route::get('/dashboard', function() {
    return view('admin.dashboard');
})->name('dashboard')->middleware(['auth',AdminMiddleware::class]);

Route::get('/users',function() {
    return view('admin.user');
})->name('users')->middleware(['auth',AdminMiddleware::class]);



Route::controller(KriteriaController::class)->group(function() {
    Route::get('/kriteria','show')->name("admin.kriteria");
    Route::post('/kriteria/create','create')->name('admin.kriteria.create');
    Route::delete('/kriteria/delete','destroy')->name('admin.kriteria.delete');
    Route::put('/kriteria/edit','update')->name('admin.kriteria.edit');
});


Route::controller(BobotController::class)->group(function() {
    Route::get('/bobot','show')->name('admin.bobot');
    Route::post('/bobot/create','create')->name('admin.bobot.create');
    Route::put('/bobot/edit','update')->name('admin.bobot.edit');
    Route::delete('/bobot/delete','destroy')->name('admin.bobot.delete');
});


Route::controller(AlternativeController::class)->group(function() {
    Route::get('/alternative','show')->name('admin.alternative');
    Route::post('/alternative/create','create')->name('admin.alternative.create');
    Route::post('/altrnative/delete','destroy')->name('admin.alternative.delete');
    Route::post('/alternative/edit','update')->name('admin.alternaive.edit');
})->middleware(['auth',AdminMiddleware::class]);