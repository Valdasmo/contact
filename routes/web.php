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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'firms'], function () {
    Route::get('', 'FirmController@index')->name('firm.index');
    Route::get('create', 'FirmController@create')->name('firm.create');
    Route::post('store', 'FirmController@store')->name('firm.store');
    Route::get('edit/{firm}', 'FirmController@edit')->name('firm.edit');
    Route::post('update/{firm}', 'FirmController@update')->name('firm.update');
    Route::post('delete/{firm}', 'FirmController@destroy')->name('firm.destroy');
    Route::get('show/{firm}', 'FirmController@show')->name('firm.show');
});

Route::group(['prefix' => 'customers'], function () {
    Route::get('', 'CustomerController@index')->name('customer.index');
    Route::get('create', 'CustomerController@create')->name('customer.create');
    Route::post('store', 'CustomerController@store')->name('customer.store');
    Route::get('edit/{customer}', 'CustomerController@edit')->name('customer.edit');
    Route::post('update/{customer}', 'CustomerController@update')->name('customer.update');
    Route::post('/delete/{customer}', 'CustomerController@destroy')->name('customer.destroy');
    Route::get('show/{customer}', 'CustomerController@show')->name('customer.show');
});
