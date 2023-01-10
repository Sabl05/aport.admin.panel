<?php

use App\Http\Controllers\admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\ShopController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ContactController;

Route::get('/', function () {
    return redirect()->route('banner.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['prefix' => 'video'], function() {
        Route::get('/', [VideoController::class, 'index'])->name('video.index');
        Route::patch('/', [VideoController::class, 'update'])->name('video.update');
    });
    Route::group(['prefix' => 'banner'], function() {
        Route::get('/', [BannerController::class, 'index'])->name('banner.index');
        Route::patch('/', [BannerController::class, 'update'])->name('banner.update');
        Route::post('/', [BannerController::class, 'store'])->name('banner.store');
        Route::delete('/{banner}', [BannerController::class, 'destroy'])->name('banner.destroy');
    });
    Route::group(['prefix' => 'shop'], function() {
        Route::get('/', [ShopController::class, 'index'])->name('shop.index');
        Route::patch('/', [ShopController::class, 'update'])->name('shop.update');
        Route::post('/', [ShopController::class, 'store'])->name('shop.store');
        Route::delete('/{shop}', [ShopController::class, 'destroy'])->name('shop.destroy');
    });
    Route::group(['prefix' => 'category'], function() {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store');
        Route::patch('/', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    Route::group(['prefix' => 'contact'], function() {
        Route::get('/', [ContactController::class, 'index'])->name('contact.index');
        Route::post('/', [ContactController::class, 'store'])->name('contact.store');
        Route::patch('/', [ContactController::class, 'update'])->name('contact.update');
        Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
    });
});

require __DIR__.'/auth.php';
