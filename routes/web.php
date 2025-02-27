<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
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

Route::controller (MainController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/artikel', 'artikel')->name('artikel');
    Route::get('/about', 'about')->name('about');
    Route::get('/project', 'project')->name('project');
    Route::get('/contact', 'contact')->name('contact');
});

Route::prefix('/admin')->group(function () {
    Route::controller(ArtikelController::class)->group(function () {
        Route::get('/artikel/show', 'index')->name('admin.artikel.show');
        Route::post('/artikel/store', 'store')->name('admin.artikel.store');
        // Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('admin.artikel.show');
        // Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('admin.artikel.edit');
        // Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
        // Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');
    });
    Route::controller(ProjectController::class)->group(function () {
        Route::get('/projek/show', 'index')->name('admin.projek.show');
        Route::post('/projek/store', 'store')->name('admin.projek.store');
        // Route::get('/projek/{id}', [ProjectController::class, 'show'])->name('admin.projek.show');
        // Route::get('/projek/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projek.edit');
        // Route::put('/projek/{id}', [ProjectController::class, 'update'])->name('admin.projek.update');
        // Route::delete('/projek/{id}', [ProjectController::class, 'destroy'])->name('admin.projek.destroy');
    });
    Route::controller(HomeController::class)->group(function () {
        Route::get('/','index')->name('admin');
        Route::get('/artikel', 'artikel')->name('admin.artikel');
        Route::get('/kategori', 'kategori')->name('admin.kategori');
        Route::get('/pengguna', 'pengguna')->name('admin.pengguna');
        Route::get('/projek', 'project')->name('admin.projek');
    });
});
