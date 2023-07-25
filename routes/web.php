<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DataController;

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

Route::get('/', [DataController::class, 'index'])->name('data.index');
Route::get('/data', [DataController::class, 'data'])->name('data.data');
Route::get('/all-data', [DataController::class, 'show'])->name('data.show');

Route::post('/upload', [DataController::class, 'storeDataName'])->name('data.upload');
Route::get('/export', [DataController::class, 'exportEmail'])->name('data.export');

Route::post('/update-data', [DataController::class, 'updateDataEmail'])->name('data.update.email');