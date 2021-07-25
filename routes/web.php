<?php

use App\Http\Controllers\ExcelUploadController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

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

Route::post('excel_Submit', [ExcelUploadController::class, 'excel'])->name('excel.upload');
Route::get('/execelUpload', [ExcelUploadController::class, 'index'])->name('excel.index');

Route::post('/execelUpload/update/', [ExcelUploadController::class, 'updateSubmit'])->name('excel.update');
Route::post('/execelUpload/delete', [ExcelUploadController::class, 'delete'])->name('excel.delete');
Route::get('/execelUpload/update/{id}', [ExcelUploadController::class, 'update']);
Route::post('/execelUpload/allDelete', [ExcelUploadController::class, 'allDelete'])->name('excel.all_delete');

Route::get('/', [MapController::class, 'index'])->name('map.index');
Route::post('/search', [MapController::class, 'search'])->name('search');
Route::get('/mobile_search', [MapController::class, 'mobileSearch'])->name('mobile_search');
Route::post('/mobile_search/result', [MapController::class, 'mobileSearchResult'])->name('mobile_result');
Route::get('/map_list', [MapController::class, 'list'])->name('map.list');
Route::get('/map/detail/{id}', [MapController::class, 'detail'])->name('map.detail');
