<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/navbar', function () {
    return view('layout.navbar');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
Route::get('/detail', [ProfileController::class, 'detail'])->name('detail');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/archive', [ProfileController::class, 'archive'])->name('archive');

Route::post('/detail', [ProfileController::class, 'addPost'])->name('add.post');
Route::get('/detail/post/{id}', [ProfileController::class, 'detailPost'])->name('detail.post');
Route::put('/detail/post/{id}', [ProfileController::class, 'editPost'])->name('edit.post');
