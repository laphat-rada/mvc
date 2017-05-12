<?php

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
Route::get('/delete1','testController@getDelete1');
Route::get('/delete2','testController@getDelete2');
Route::get('/update','testController@getUpdate');
Route::get('/editpage','testController@getSelect');
Route::get('/edit','testController@getEdit');
Route::get('/save', 'testController@getSave');
Route::get('/insert', 'testController@getSelectArt');
Route::get('/test1', 'testController@getShow');
Route::get('/test2', 'testController@getEnter');
Route::get('/test3', 'testController@getShows');
Route::get('/test',  function() {
    return view('webpage');
});

Route::get('check-connect', function() {
    if (DB::connection()->getDatabaseName()) {      
        return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
    } else {
        return 'Connection False !!';
    }
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
