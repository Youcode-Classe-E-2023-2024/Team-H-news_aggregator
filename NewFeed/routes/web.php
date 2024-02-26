<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\StatsadminController;
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

Route::get('/dashboard',function(){
    return view('admin.dashboard');
})->name('dashboard');
Route::post('/register/send', [AuthController::class, 'register'])->name('register.send');
Route::post('/login/send', [AuthController::class, 'login'])->name('login.send');

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [AuthController::class, 'userInfo']);
});



Route::get('/api/donnees-graphique', [StatsadminController::class, 'tendanceEnregistrementUtilisateur']);
Route::get('/api/nbrUser', [StatsadminController::class, 'nombreUtilisateurs']);


