<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Auth::routes();

Route::get('/', [MainController::class, 'index'])->name('home');
Route::prefix('/admin')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('admin');
        Route::get('/artikel', [HomeController::class, 'artikel'])->name('admin.artikel');
    });
});
