<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // if you don’t put with() here, you will have N+1 query performance problem
    return view('pages.home');
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('dashboard', function(){
		return view('dashboard');
	})->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    //Route::resource('transactions', TransactionController::class);
    Route::resource('transactions', \App\Http\Controllers\TransactionController::class);
    Route::resource('accounts', \App\Http\Controllers\AccountController::class);
    
});

Route::view('about', 'pages.about')->name('about');

require __DIR__.'/auth.php';
