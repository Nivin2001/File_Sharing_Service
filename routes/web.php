<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
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
}) ->name('home') ->middleware('auth');

Route::get('/login',[LoginController::class,'create'])
->name('login')
->middleware('guest');

// بدي الي يدخل عليها يكون guest
// not athicated
Route::post('/login',[LoginController::class,'store'])
->middleware('guest');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/home',[FileController::class,'index'])->name('home');
Route::get('/file',[FileController::class,'upload'])->name('Files.upload');
Route::post('/uploadFiles',[FileController::class,'store'])->name('Files.store');
Route::get('/file/{fileLink}',[FileController::class,'show'])->name('Files.show');
Route::get('/download/{fileLink}', [FileController::class, 'download'])->name('Files.download');
 Route::get('/share/{fileLink}', [FileController::class, 'share'])->name('Files.share');
