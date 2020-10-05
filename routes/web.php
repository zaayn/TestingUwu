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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', 'UserController@index')->name('home');



//Route Uji Aplikasi (Penilaian Karakteristik)
Route::get('/insert/pk', 'PKController@insert')->name('insert.pk');
Route::post('/store/pk', 'PKController@store')->name('store.pk');

Route::group(['prefix' => 'admin',  'middleware' => 'is_admin'], function(){
// halaman admin disini
	Route::get('/home', 'AdminController@index')->name('adminhome');

	// user -----------
	Route::get('/kelolaadmin', 'AdminController@view_admin')->name('adminview');
	Route::get('/profil', 'AdminController@editprofil')->name('editprofil');
	Route::post('/profil', 'AdminController@editprofil');
	Route::get('/profil/{id}', 'AdminController@edit');
	Route::post('/update{id}','AdminController@update')->name('update.user');
	Route::get('/tambahadmin', 'AdminController@tambahadmin')->name('tambahadmin');
	Route::post('/storeadmin', 'AdminController@storeadmin');
	Route::get('/delete/user{id}','AdminController@delete')->name('delete.user');

	// ini ikut mana ------
	Route::post('/store/aplikasi', 'AplikasiController@store')->name('store.aplikasi');
	Route::get('/tambahbobot', 'AdminController@tambahbobot')->name('tambahbobot');

	// karakteristik -------
	Route::get('/karakteristik', 'KarakteristikController@index')->name('index.karakteristik');
	Route::get('/tambah_karakteristik', 'KarakteristikController@insert')->name('insert.karakteristik');
	Route::post('/store/karakteristik', 'KarakteristikController@store')->name('store.karakteristik');
	Route::get('/delete/karakteristik{id}','KarakteristikController@delete')->name('delete.karakteristik');
	
	// sub-Karakteristik
	Route::get('/edit_sub/subkarakteristik{id}', 'SubkarakteristikController@edit')->name('edit.sub');
	Route::post('/update/subkarakteristik{id}','SubkarakteristikController@update')->name('update.sub');

});

Route::group(['prefix' => 'softwaretester',  'middleware' => 'is_user'], function(){
	// halaman software tester disini --------
	Route::get('/home', 'UserController@index')->name('home');

	//edit profil
	Route::get('/profil/{id}', 'UserController@edit');
	Route::post('/update','UserController@update');

	Route::get('/capacity', 'PSController@loadtest')->name('capacity');

	//route kuisioner
	Route::get('/edit/subkarakteristik{id}', 'KuisionerController@kuis')->name('edit.subs');
	Route::post('/update/subs{sk_id}','KuisionerController@update')->name('update.subs');

	//Route Aplikasi
	Route::get('/aplikasi', 'AplikasiController@index')->name('index.aplikasi');
	Route::get('/aplikasi/{id}', 'AplikasiController@nilai')->name('nilai');
	Route::get('/insert_aplikasi', 'AplikasiController@insert')->name('insert.aplikasi');
	Route::post('/store/aplikasi', 'AplikasiController@store')->name('store.aplikasi');
	Route::get('/delete/aplikasi{id}', 'AplikasiController@delete')->name('delete.aplikasi');
	Route::get('/edit/aplikasi{id}', 'AplikasiController@edit')->name('edit.aplikasi');
	Route::post('/update/aplikasi{id}','AplikasiController@update')->name('update.aplikasi');

	//automatic
	Route::get('/automatic/{id}', 'PSController@index')->name('automatic');
});