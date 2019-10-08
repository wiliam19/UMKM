<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/input-user', 'UserController@inputUser');

Route::get('/tampil-user', 'UserController@tampilUser');

Route::get('/form-user', 'UserController@formUser');

Route::post('/simpan-user', 'UserController@simpanUser');

Route::get('/edit-user/{id}', 'UserController@formEditUser'); 

Route::post('/update-user/{id}', 'UserController@updateUser'); 

Route::get('/delete-user/{id}', 'UserController@deleteUser');

Route::get('/tampil-kendaraan', 'KendaraanController@tampilKendaraan');

Route::get('/form-kendaraan', 'KendaraanController@formKendaraan'); 

Route::post('/simpan-kendaraan', 'KendaraanController@simpanKendaraan');

Route::get('/edit-kendaraan/{id}', 'KendaraanController@formEditKendaraan'); 

Route::post('/update-kendaraan/{id}', 'KendaraanController@updateKendaraan');

Route::get('/delete-kendaraan/{id}', 'KendaraanController@deleteKendaraan');

Route::get("/users", 'UserController@index')->name("user.index");

Route::get("/users/create", 'UserController@create')->name("user.create");

Route::post("/users", 'UserController@store')->name("user.store");

Route::get("/users/{id}/edit", 'UserController@edit')->name("user.edit");

Route::post("/users/{id}", 'UserController@update')->name("user.update");

Route::get("/users/{id}/delete", 'UserController@delete')->name("user.delete"); 

Route::get('/login', 'SecurityController@login')->name('login');

Route::post('/login', 'SecurityController@prosesLogin');

Route::get('/logout', 'SecurityController@logout');

Route::get("/users", 'UserController@index')->name("user.index");

Route::get("/users/create", 'UserController@create')->name("user.create");

Route::post("/users", 'UserController@store')->name("user.store");

Route::get("/users/{id}/edit", 'UserController@edit')->name("user.edit");

Route::post("/users/{id}", 'UserController@update')->name("user.update");

Route::get("/users/{id}/delete", 'UserController@delete')->name("user.delete");