<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('authentication.login');
})->name('login');

Route::get('/register', function () {
    return view('authentication.register');
})->name('register');

Route::get('/forget', function () {
    return view('authentication.forget');
})->name('forget');

Route::get('/reset/{token}',function (){
    return view('authentication.reset');
});

Route::get('/',function(){
    return view('client.home');
});

Route::get('/dahsboard',function(){
    return view('admin\dashboard');
});