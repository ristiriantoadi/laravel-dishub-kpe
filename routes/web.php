<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PagesController@home');
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout');
Route::post('/postlogin', 'AuthController@postlogin');



Route::get('/input', 'DataController@input')->middleware('auth');
Route::get('/dashboard', 'DataController@dashboard')->middleware('auth');
//Route::get('/edit', 'DataController@');
Route::post('/input', 'DataController@store')->middleware('auth');
Route::get('/print', 'DataController@index')->middleware('auth');
Route::get('/print/cari', 'DataController@cari')->middleware('auth');

// kartu dan sk expired / notifikasi / expired
Route::get('/expired/kartu', 'NotificationController@kartuExpired')->middleware('auth');
Route::get('/expired/sk', 'NotificationController@skExpired')->middleware('auth');
Route::get('/expired/{type}/cari', 'NotificationController@cariExpired');
Route::get('/cek_expired','NotificationController@checkExpired');
Route::get('/test_excel', 'NotificationController@exportExcel'); // excel


Route::get('/', 'DataController@search');
Route::get('/kendaraans', 'KendaraanController@index')->middleware('auth');
Route::get('/cetak_pdf', 'KendaraanController@cetak_pdf')->middleware('auth');
Route::get('/cetak_pdf2', 'KendaraanController@cetak_pdf2')->middleware('auth');
Route::get('/kendaraans/cari', 'KendaraanController@cari')->middleware('auth');
Route::patch('/kendaraans/{kendaraan}', 'KendaraanController@update')->middleware('auth');
//delete
Route::get('/delete/cari', 'DeleteController@cari')->middleware('auth');
Route::get('/delete', 'DeleteController@index')->middleware('auth');
Route::delete('/delete/{kendaraan}', 'DeleteController@destroy')->middleware('auth');

Route::get('/profils', 'AdminController@index')->middleware('auth');
Route::post('/profils', 'AdminController@store')->middleware('auth');