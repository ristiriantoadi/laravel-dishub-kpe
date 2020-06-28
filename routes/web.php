<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PagesController@home');
Route::get('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::post('/postlogin', 'AuthController@postlogin');



Route::get('/input', 'DataController@input');
Route::get('/dashboard', 'DataController@dashboard');
//Route::get('/edit', 'DataController@');
Route::post('/input', 'DataController@store');
Route::get('/print', 'DataController@index');
Route::get('/print/cari', 'DataController@cari');

Route::get('/', 'DataController@search');
Route::get('/kendaraans', 'KendaraanController@index');
Route::get('/cetak_pdf', 'KendaraanController@cetak_pdf');
Route::get('/kendaraans/cari', 'KendaraanController@cari');
Route::patch('/kendaraans/{kendaraan}', 'KendaraanController@update');

Route::get('/profils', 'AdminController@index');
Route::post('/profils', 'AdminController@store');