<?php

use Illuminate\Http\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
//use App\Http\Controllers\FileController;



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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [DashboardController::class,'dashboard'])->middleware(['auth'])->name('dashboard');

Route::post('upload',[DashboardController::class ,'upload']);
Route::get('/download_single/{id}', [DashboardController::class,'singleDownload']);
Route::post('/downloadMultipleFiles', [DashboardController::class,'downloadMultipleFiles']);



require __DIR__.'/auth.php';
