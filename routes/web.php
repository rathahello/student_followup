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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('students','StudentController');
Route::post('addcomment/{id}','commentController@addcomment')->name('addcomment');
Route::get('deletecomment/{id}','commentController@delete')->name('deletecomment');
Route::post('updatecomment/{id}','commentController@updateComment')->name('updatecomment');

Route::get('outoffollowup/{id}','StudentController@outOfFollowup')->name('outoffollowup');
Route::get('followup/{id}','StudentController@followUp')->name('followup');
