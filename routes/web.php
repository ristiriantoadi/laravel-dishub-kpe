<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', 'PagesController@home');
Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout');
Route::post('/postlogin', 'AuthController@postlogin');



Route::get('/input', 'DataController@input')->middleware('auth');
Route::get('/dashboard', 'DataController@dashboard')->middleware('auth');
Route::post('/input', 'DataController@store')->middleware('auth');
Route::get('/print', 'DataController@index')->middleware('auth');
Route::get('/print/cari', 'DataController@cari')->middleware('auth');

// kartu dan sk expired / notifikasi / expired
Route::get('/expired/kartu', 'NotificationController@kartuExpired')->middleware('auth');
Route::get('/expired/sk', 'NotificationController@skExpired')->middleware('auth');
Route::get('/expired/{type}/cari', 'NotificationController@cariExpired');
Route::get('/expired/{type}/export', 'NotificationController@exportExpired');
Route::get('/cek_expired','NotificationController@checkExpired');

// pemberitahuan
Route::get('/pemberitahuan', 'PemberitahuanController@index')->middleware('auth');
Route::post('/pemberitahuan', 'PemberitahuanController@add')->middleware('auth');
Route::post('/pemberitahuan/edit/{id}', 'PemberitahuanController@edit')->middleware('auth');
Route::get('/pemberitahuan/delete/{id}', 'PemberitahuanController@delete')->middleware('auth');

//rekap data
Route::get('/rekap', 'DataController@rekap')->middleware('auth');
Route::get('/rekap/export', 'DataController@export')->middleware('auth');
Route::get('/rekap/export/jenis_pelayanan_angkutan', 'DataController@exportJenisPelayananAngkutan')->middleware('auth');

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

//create symlink
// Route::get('/symlink', function () {
//     Artisan::call('storage:link');
// 	return 'ok';
// });

Route::get('/info', function () {
    // return "abc";
    return phpinfo();
});



Route::get("/storage/{extra}", function ($extra) {
    return redirect('/public/storage/'.$extra);
})->where("extra", ".*");