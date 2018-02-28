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

Route::get('/','DocController@showLoginForm');

Route::get('/home','DocController@showDoc');

Route::get('/document{id}','DocController@showDocContent');

Route::post('/insertDoc','DocController@insertDoc');

Route::post('/editdoc','DocController@editDoc');

Route::get('/deletedoc{id}','DocController@deletedoc');

Route::get('/permission{id}','PermissionController@showPermission');

Route::get('/deletePerm{id}','PermissionController@deletePermission');

Route::post('/addPerm','PermissionController@addPermission');

Route::post('/storeTerm','TermController@storeTerm');

Route::get('/delTerm{id}','TermController@delTerm');

Route::post('/editTerm','TermController@editTerm');

Route::get('/addcontent{id_doc}', 'ContentController@showAddForm');

Route::post('/submitcontent{id_doc}', 'ContentController@insertContent');

Route::get('/editcontent{id_content}', 'ContentController@showEditForm');

Route::post('/editcontent{id_content}success', 'ContentController@updateContent');

Route::get('/deletecontent{id_content}', 'ContentController@deleteContent');

Route::post('/editurutan{id_doc}success', 'ContentController@editUrutan');

Route::get('/canceleditcontent{id_content}', 'ContentController@cancelEditContent');

Route::get('/downloadPDF{id}','ContentController@downloadPDF');

Route::post('/login','PenggunaController@cekLogin');
Route::get('/logout', 'PenggunaController@logout');