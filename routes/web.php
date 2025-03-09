<?php

use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});

Route::get('/test', [TestController::class, 'index']);
Route::get('/test/{id}', [TestController::class, 'show']);

Route::get('/question', [QuestionController::class, 'index']);
Route::get('/question/{id}', [QuestionController::class, 'show']);

Route::get('/option', [OptionController::class, 'index']);
//Route::get('/Option/{id}', [OptionController::class, 'show']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
