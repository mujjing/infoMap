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

Route::post('excel_Submit', 'ExcelUploadController@excel')->name('excel.upload');
Route::get('/execelUpload', 'ExcelUploadController@index')->name('excel.index');

Route::post('/execelUpload/update/', 'ExcelUploadController@updateSubmit')->name('excel.update');
Route::post('/execelUpload/delete', 'ExcelUploadController@delete')->name('excel.delete');
Route::get('/execelUpload/update/{id}', 'ExcelUploadController@update');

Route::post('/execelUpload/allDelete', 'ExcelUploadController@allDelete')->name('excel.all_delete');
Route::post('/execelUpload/delete', 'ExcelUploadController@delete')->name('excel.delete');

Route::get('/', 'MapController@index')->name('map.index');
Route::post('/search', 'MapController@search')->name('search');
Route::get('/mobile_search', 'MapController@mobileSearch')->name('mobile_search');
Route::post('/mobile_search/result', 'MapController@mobileSearchResult')->name('mobile_result');
Route::get('/map_list', 'MapController@list')->name('map.list');
Route::get('/map/detail/{id}', 'MapController@detail')->name('map.detail');