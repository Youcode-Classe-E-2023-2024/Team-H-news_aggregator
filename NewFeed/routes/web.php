<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StatsadminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FluxRSSController;
use App\Http\Controllers\test;
use App\Http\Controllers\DashboardController;

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
})->name('home');

Route::get('/dashboard',function(){
    return view('admin.dashboard');
})->name('dashboard');

Route::post('/register/send', [AuthController::class, 'register'])->name('register.send');
Route::post('/login/send', [AuthController::class, 'login'])->name('login.send');

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [AuthController::class, 'userInfo']);
});



/**--- fati ----**/
Route::get('/categories',[CategoriesController::class,'index'])->name('categories');
Route::post('/categories',[CategoriesController::class,'store'])->name('add-category');
Route::put('/categories',[CategoriesController::class,'update'])->name('update-category');
Route::delete('/categories',[CategoriesController::class,'delete'])->name('delete-category');

/**--- fati ----**/



/** ---- Mohammed ---- **/

Route::get('/addRss', [FluxRSSController::class, 'addRssPage'])->name('addRss.index');
Route::post('/addRss', [FluxRSSController::class, 'store'])->name('addRss.store');

Route::get('/showRss', [FluxRSSController::class, 'showRss'])->name('rss.index');
Route::post('/showRss', [FluxRSSController::class, 'showRss'])->name('rss.send');

/** ---- Mohammed ---- **/




/*======================  mohammed elghanam  =======================*/
Route::get('/display',function(){
    return view('admin.dsplay_users');
});

/*======================  mohammed elghanam  =======================*/

//Route::get('/dashboard',function(){
//    return view('admin.dashboard');
//})->name('dashboard');


/*============================== Walid Saifi ============================*/

Route::get('/api/donnees-graphique', [StatsadminController::class, 'tendanceEnregistrementUtilisateur']);
Route::get('/api/nbrUser', [StatsadminController::class, 'nombreUtilisateurs']);
Route::get('/api/tendances', [StatsadminController::class, 'tendancePosts'])->name('tendances');
Route::get('/api/nbrUser', [StatsadminController::class, 'nombreUtilisateursPost']);

Route::get('/api/getNombreJours', [StatsadminController::class, 'getNombreJours']);

Route::get('/api/getNombrePostsJours', [StatsadminController::class, 'getNombrePostsJours']);

