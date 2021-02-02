<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::group(['prefix' => '{locale?}', 'middleware' => ['localize']], function () {

    Route::get('/', function () {
        return view('home');
    })->name('homePage');

    Route::get('/aboutme', function () {
        return view('about');
    })->name('aboutPage');


    Route::get('/work', 'TracksController@showTracks')->name('workPage');

    Route::get('/contact', 'ContactMessages@showForm')->name('contactPage');

    Route::post('/contact', 'ContactMessages@saveContact')->name('postContact');
});
