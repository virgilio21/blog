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
Route::get('/', function () {

    if(\Illuminate\Support\Facades\Auth::guest()){
        return redirect('/login');
    }
    return redirect('/home');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/createView/{id}','PollController@createView')->name('createView');
    Route::get('/create','PollController@create')->name('create');
    Route::get('/updateVisibility/{id}','PollController@updateVisibility')->name('updateVisibility');
    Route::get('/createSection/{pollid}','SectionController@create')->name('createSection');
    Route::get('/createQuestion/{pollid}','QuestionController@create')->name('createQuestion');
});
