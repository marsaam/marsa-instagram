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


Route::get('/navbar', function () {
    return view('layout.navbar');
});



Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
Route::get('/detail', [ProfileController::class, 'detail'])->name('detail');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/archive', [ProfileController::class, 'archive'])->name('archive');

Route::post('/detail', [ProfileController::class, 'addPost'])->name('add.post');
Route::get('/detail/post/{id}', [ProfileController::class, 'detailPost'])->name('detail.post');
Route::put('/detail/post/{id}', [ProfileController::class, 'editPost'])->name('edit.post');

Route::get('/', [ProfileController::class, 'welcome'])->name('welcome');
Route::post('/', [ProfileController::class, 'register'])->name('register');
Route::get('/login', [ProfileController::class, 'login'])->name('login');
Route::post('/login', [ProfileController::class, 'authenticate'])->name('auth');


Route::get('/detail/profile/{id}', [ProfileController::class, 'detailProfile'])->name('detail.profile');
Route::put('/detail/profile/{id}', [ProfileController::class, 'editProfile'])->name('edit.profile');

Route::get('/preview-pdf', [ProfileController::class, 'preview'])->name('preview.pdf');
Route::get('/download-posts-xls', [ProfileController::class, 'downloadXLS'])->name('posts.xls');

// Route::get('/preview-filter', [ProfileController::class, 'filter'])->name('filter.post');
