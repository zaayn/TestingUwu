<?php

use App\Http\Controllers\AplikasiController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

	Route::get('/home', 'UserController@index')->name('admin.home');
//Route Uji Aplikasi (Penilaian Karakteristik)
	Route::get('/insert/pk', 'PKController@insert')->name('insert.pk');
	Route::post('/store/pk', 'PKController@store')->name('store.pk');

Route::group(['prefix' => 'admin',  'middleware' => 'is_admin'], function(){
// halaman admin disini
	Route::get('/home', 'AdminController@index')->name('adminhome');

	Route::get('/kelolaadmin', 'AdminController@view_admin')->name('adminview');
	Route::get('/profil', 'AdminController@editprofil')->name('editprofil');
	Route::post('/profil', 'AdminController@editprofil');
	Route::get('/profil/{id}', 'AdminController@edit');
	Route::post('/update{id}','AdminController@update')->name('update.user');
	Route::get('/tambahadmin', 'AdminController@tambahadmin')->name('tambahadmin');
	Route::post('/storeadmin', 'AdminController@storeadmin');
	Route::get('/delete/user{id}','AdminController@delete')->name('delete.user');
	
	// admin lihat data software tester
	Route::get('/kelolasoftwaretester', 'AdminController@view_softwaretester')->name('softwaretesterview');

	// ini ikut mana ------
	Route::post('/store/aplikasi', 'AplikasiController@store')->name('store.aplikasi');
	Route::get('/tambahbobot', 'AdminController@tambahbobot')->name('tambahbobot');

	// karakteristik -------
	Route::get('/karakteristik', 'KarakteristikController@index')->name('index.karakteristik');
	Route::get('/tambah_karakteristik', 'KarakteristikController@insert')->name('insert.karakteristik');
	Route::post('/store/karakteristik', 'KarakteristikController@store')->name('store.karakteristik');
	Route::get('/edit_karakteristik/karakteristik{id}', 'KarakteristikController@edit')->name('edit.karakteristik');
	Route::post('/update/karakteristik{id}','KarakteristikController@update')->name('update.karakteristik');
	Route::get('/delete/karakteristik{id}','KarakteristikController@delete')->name('delete.karakteristik');

	//route admin table edit karakteristik ----------------------------------------
	Route::get('/edit_bobot_karakteristik_admin', 'EditTableAdminController@edit_bobot_karakteristik_admin')->name('edit.bobot.karakteristik.admin');
	Route::post('edit_bobot_karakteristik/action', 'EditTableAdminController@action_edit_kar')->name('action.edit.kar');

	//route table edit admin subkarakteristik
	Route::get('/karakteristik/{id}/edit_sub_admin', 'EditTableAdminController@edit_sub_admin')->name('edit.sub.admin');
	Route::post('/karakteristik/edit_sub_admin/action', 'EditTableAdminController@action_sub_admin')->name('action.sub.admin');

	// sub-Karakteristik
	Route::get('/edit_sub/subkarakteristik{id}', 'SubkarakteristikController@edit')->name('edit.sub');
	Route::post('/update/subkarakteristik{id}','SubkarakteristikController@update')->name('update.sub');
	Route::get('/delete/subkarakteristik{id}','SubkarakteristikController@delete')->name('delete.subkarakteristik');

});

Route::group(['prefix' => 'softwaretester',  'middleware' => 'is_user'], function(){
	// halaman software tester disini --------
	Route::get('/home', 'UserController@index')->name('softwaretester.home');

	//edit profil
	Route::get('/profil/{id}', 'UserController@edit');
	Route::post('/update','UserController@update');

	//route kuesioner
	Route::get('/kuesioner/{id}', 'KuisionerController@kuis')->name('kuisioner');
	Route::post('/kuesioner/{id}/update', 'KuisionerController@update')->name('tambah.kuesioner');

	//Route Aplikasi
	Route::get('/aplikasi', 'AplikasiController@index')->name('index.aplikasi');
	Route::get('/aplikasi/{id}', 'AplikasiController@nilai')->name('nilai');
	Route::get('/insert_aplikasi', 'AplikasiController@insert')->name('insert.aplikasi');
	Route::post('/store/aplikasi', 'AplikasiController@store')->name('store.aplikasi');
	Route::get('/delete/aplikasi{id}', 'AplikasiController@delete')->name('delete.aplikasi');
	Route::get('/edit/aplikasi{id}', 'AplikasiController@edit')->name('edit.aplikasi');
	Route::post('/update/aplikasi{id}','AplikasiController@update')->name('update.aplikasi');

	//route tabledit karakteristik
	Route::get('/aplikasi/{id}/customkarakteristik', 'KarakteristikController@customkar')->name('custom.kar');
	Route::post('/aplikasi/customkarakteristik/action', 'KarakteristikController@actionkar')->name('action.kar');

	//route tabledit subkarakteristik
	Route::get('/aplikasi/{id}/customsubkarakteristik', 'SubkarakteristikController@customsub')->name('custom.sub');
	Route::post('/aplikasi/customsubkarakteristik/action', 'SubkarakteristikController@actionsub')->name('action.sub');

	//automatic
	Route::get('/capacity/{id}','AutomaticController@capacity')->name('capacity');
	Route::get('/automatic/{id}', 'PSController@index')->name('automatic');
	Route::get('/uploadFile', 'UploadController@upload')->name('upload');
	Route::post('/uploadFile/proses', 'UploadController@proses_upload')->name('proses');
	Route::get('/modularity/{id}','CohesionController@cohesion')->name('cohesion');
	// Route::get('/modularity/parser','CohesionController@cohesion')->name('cohesion');
	

	//Route Bobot Karakteristik
	Route::get('/bobot','KarakteristikController@bobot')->name('view.bobot');
	Route::get('/bobot/sub{id}','SubkarakteristikController@bobotsub')->name('view.bobotsub');

	//Route Hasil Pengukuran
	Route::get('/aplikasi/{id}/pengukuran', 'AplikasiController@hasil')->name('hasil');

	//Route Download PDF
	Route::get('/aplikasi/{id}/cetak', 'AplikasiController@cetak_pdf')->name('cetak_pdf');

	// Route::get('/customer/print-pdf','AplikasiController@cetak_pdf')->name('customer.printpdf');

});