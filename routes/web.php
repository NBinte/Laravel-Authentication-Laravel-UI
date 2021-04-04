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


// Route::get('/', function () {
//     return view('welcome1');
// });


Route::get('/reports', function () {
    return 'The secret reports';
})->middleware('can:view_reports'); //locking the endpoint down



Route::get('/contact', 'App\Http\Controllers\ContactController@show');

Route::post('/contact', 'App\Http\Controllers\ContactController@store');

// Route::get('/logout', function () {

//     auth()->logout();

//     return 'You are now logged out';
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');


Route::get('payments/create', 'App\Http\Controllers\PaymentController@create')
    ->middleware('auth');


Route::post('payments', 'App\Http\Controllers\PaymentController@store')
    ->middleware('auth');

Route::get('notifications', 'App\Http\Controllers\UserNotificationController@show')
    ->middleware('auth');





Route::get('conversations', 'App\Http\Controllers\ConversationController@index');

// Route::get('conversations/{conversation}', 'App\Http\Controllers\ConversationController@show');

Route::get('conversations/{conversation}', 'App\Http\Controllers\ConversationController@show')
    ->middleware('can:view,conversation'); //authorization on route level

Route::post('best-replies/{reply}', 'App\Http\Controllers\ConversationBestReplyController@store');


Auth::routes();


//users

//John => moderator, Sally => manager, Frank => owner

//moderator => 'edit_forum'

//owner => 'view_financial_reports'


