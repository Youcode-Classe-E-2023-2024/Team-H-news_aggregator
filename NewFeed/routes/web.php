<?php

use App\Http\Controllers\Api\AuthController;
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

Route::post('/forget/send', [AuthController::class, 'send_email'])->name('send_email');
Route::get('/reset/{email}/{token}', [AuthController::class, 'reset'])->name('reset');
Route::post('/reset/password', [AuthController::class, 'reset_password'])->name('reset_password');



// Route::get('/reset/{token}',function (){
//     return view('authentication.reset');
// });

Route::get('/',function(){
    return view('client.home');
});

Route::get('/dahsboard',function(){
    return view('admin\dashboard');
});
Route::post('/register/send', [AuthController::class, 'register'])->name('register.send');
Route::post('/login/send', [AuthController::class, 'login'])->name('login.send');
 
Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [AuthController::class, 'userInfo']);
});