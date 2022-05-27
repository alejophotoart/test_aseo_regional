<?php

use App\Http\Controllers\MovieController;
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

Route::get('/', [MovieController::class, 'index'])->name('index.movie');
Route::get('/create/movie', [MovieController::class, 'create'])->name('create.movie');
Route::get('/edit/movie/{id}', [MovieController::class, 'edit'])->name('edit.movie');
Route::post('/create', [MovieController::class, 'store']);
Route::put('/edit/{id}', [MovieController::class, 'update']);
Route::delete('/delete/{id}', [MovieController::class, 'destroy']);
