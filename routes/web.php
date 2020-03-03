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


//modul admin
Route::get('/', 'AdminController@index');

Route::get('/superadmin/login', 'AdminController@login');

Route::get('/superadmin/create', 'AdminController@create');

Route::post('/superadmin/createpost', 'AdminController@createPost');

Route::get('/superadmin/edit/{id}', 'AdminController@edit');

Route::post('/superadmin/update/', 'AdminController@update');

Route::post('/superadmin/updatePass/', 'AdminController@updatePass');

Route::post('/loginPost','AdminController@loginPost');

Route::get('/logout','AdminController@logout');

Route::get('/superadmin/createpenguji', 'PengujiController@createPenguji');

Route::post('/superadmin/createpengujipost', 'PengujiController@createPengujiPost');

Route::get('/superadmin/listpenguji', 'PengujiController@listpenguji');

Route::get('/superadmin/editpenguji/{id}', 'PengujiController@editPenguji');

Route::post('/superadmin/editpengujipost', 'PengujiController@update');

Route::post('/superadmin/deletepengujipost/{id}', 'PengujiController@deletePengujiPost');

Route::get('/superadmin/createsiswa', 'SiswaController@create');

Route::post('/superadmin/createsiswapost', 'SiswaController@createPost');

Route::get('/superadmin/listsiswa', 'SiswaController@index');

Route::get('/superadmin/editsiswa/{id}', 'SiswaController@update');

Route::post('/superadmin/editsiswapost', 'SiswaController@updatePost');

Route::post('/superadmin/deletsiswapost/{id}', 'SiswaController@deletesiswaPost');

Route::get('/superadmin/report', 'MasterNilaiController@index');

Route::get('/superadmin/detailreport/{id}', 'MasterNilaiController@show');

//modul user
Route::get('/user/login', 'PengujiController@login');

Route::get('/user/logout', 'PengujiController@logout');

Route::get('/user','PengujiController@index');

Route::post('/user/loginPostUser','PengujiController@loginPost');

Route::post('/user/StoreNilai','MasterNilaiController@store');

Route::post('/user/updateTotalNilai/{id}','MasterNilaiController@update');

Route::get('/user/PrintReport','MasterNilaiController@printprv');

Route::get('/user/PrintDetailReport/{id}','MasterNilaiController@printprvdtl');

Route::get('/user/dropdown/{id}','PengujiController@siswaDropdown');

Route::get('/user/lihathasil/{id}','MasterNilaiController@showhasil');

Route::get('/user/edithasil/{id}','MasterNilaiController@edithasil');

Route::post('/user/updatehasilpost/{id}','MasterNilaiController@updatehasil');

Route::get('/user/exportdetail_excel/{id}', 'MasterNilaiController@exportdetail_excel');