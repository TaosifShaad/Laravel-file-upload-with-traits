<?php

use App\Http\Controllers\UploadFile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [uploadFile::class, 'getData'])->name('upload');
Route::post('/upload', [uploadFile::class, 'uploadFile'])->name('upload.post');
Route::get('/edit/{id}', [uploadFile::class, 'edit'])->name('edit');
Route::put('/update/{id}', [uploadFile::class, 'updateFile'])->name('update.post');
