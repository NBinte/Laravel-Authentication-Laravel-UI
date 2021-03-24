<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('/contact', 'App\Http\Controllers\ContactController@show');

Route::post('/contact', 'App\Http\Controllers\ContactController@store');

// Route::get('/logout', function () {

//     auth()->logout();

//     return 'You are now logged out';
// });

Route::get('payments/create', 'App\Http\Controllers\PaymentController@create')
    ->middleware('auth');


Route::post('payments', 'App\Http\Controllers\PaymentController@store')
    ->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');
