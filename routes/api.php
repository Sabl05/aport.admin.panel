<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\VideoController;
use App\Http\Controllers\api\v1\BannerController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\ShopController;
use App\Http\Controllers\api\v1\ContactController;

Route::get('/video', [VideoController::class, 'index']);
Route::get('/banner', [BannerController::class, 'index']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);

