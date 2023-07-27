<?php
namespace App\Http\Controllers;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/view',[FileController::class,'index'])->name('Files.index');
Route::get('/uploadFiles/create',[FileController::class,'create'])->name('Files.create');
Route::post('/uploadFiles',[FileController::class,'store'])->name('Files.store');
Route::get('/download/{filename}', [FileController::class, 'download'])->name('Files.download');
// Route::get('/share/{file}', [FileControl::class, 'share'])->name('file.share');
// Route::get('file/{id}',[FileController::class,'show'])->name('Files.show');




