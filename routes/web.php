<?php

use Illuminate\Support\Facades\Auth;
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



Route::middleware('auth')->group(function(){
    Route::get('/','DashboardController@index')->name('dashboard.index')->middleware('auth');

    Route::prefix('identitication')->group(function(){
        Route::get('/','IdentificationController@index')->name('identification.index');
        Route::get('create','IdentificationController@create')->name('identification.create');
        Route::post('store','IdentificationController@store')->name('identification.store');
        Route::get('{id}/edit','IdentificationController@edit')->name('identification.edit');
        Route::get('{id}/show','IdentificationController@show')->name('identification.show');
        Route::put('{id}/update','IdentificationController@update')->name('identification.update');
        Route::delete('{id}/destroy','IdentificationController@destroy')->name('identification.destroy');
        Route::get('{id}/capture','IdentificationController@capture')->name('identification.capture');
        Route::put('{id}/capture','IdentificationController@capturestore')->name('identification.capture.store');
    });

    Route::prefix('personne')->group(function(){
        Route::get('/','PersonneController@index')->name('personne.index');
        Route::get('create','PersonneController@create')->name('personne.create');
        Route::post('store','PersonneController@store')->name('personne.store');
        Route::get('{id}/edit','PersonneController@edit')->name('personne.edit');
        Route::get('{id}/show','PersonneController@show')->name('personne.show');
        Route::put('{id}/update','PersonneController@update')->name('personne.update');
        Route::delete('{id}/destroy','PersonneController@destroy')->name('personne.destroy');
        Route::get('{id}/capture','PersonneController@capture')->name('personne.capture');
        Route::put('{id}/capture','PersonneController@capturestore')->name('personne.capture.store');
    });
});

Route::post('custom-login','DashboardController@login')->name('custom.login');

Auth::routes();