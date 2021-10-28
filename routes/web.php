<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');
Route::get('/list', [App\Http\Controllers\FrontendController::class, 'list'])->name('list');
Route::get('/list/search', [App\Http\Controllers\FrontendController::class, 'search'])->name('search');
Route::get('/list/detail/{id}', [App\Http\Controllers\FrontendController::class, 'detail'])->name('detail');
Route::post('/order', [App\Http\Controllers\FrontendController::class, 'order'])->name('order');
Route::get('/about-us', [App\Http\Controllers\FrontendController::class, 'about'])->name('about-us');
Route::get('/contact-us', [App\Http\Controllers\FrontendController::class, 'contact'])->name('contact-us');
Route::post('/sendemail', [App\Http\Controllers\FrontendController::class, 'sendemail'])->name('sendemail');

Auth::routes();
 
Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::resource('/posts', App\Http\Controllers\Admin\PostController::class); //post kontrakan
        Route::resource('/penyewa', App\Http\Controllers\Admin\TenantsController::class); //penyewa
        Route::resource('/transaksi', App\Http\Controllers\Admin\TransaksiController::class); //transaksi
        Route::resource('/laporan', App\Http\Controllers\Admin\LaporanController::class); //laporan keluhan
        Route::resource('/setting-website', App\Http\Controllers\Admin\SettingWebsiteController::class);
    });
    
    Route::middleware(['penyewa'])->group(function () {
        Route::resource('/kontrakan', App\Http\Controllers\Penyewa\SewaController::class); //kontrakan
        Route::resource('/pembayaran', App\Http\Controllers\Penyewa\TransaksiController::class); //transaksi
        Route::resource('/keluhan', App\Http\Controllers\Penyewa\LaporanController::class); //keluhan
    });

    // Route::middleware(['member'])->group(function () {
    // });

    Route::get('/logout', function(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        redirect('/');
    });
});