<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Route::get('/products', [ProductController::class, 'index'])->name('index'); //商品一覧
Route::get('/products/register', [ProductController::class, 'create'])->name('products.register'); //商品登録
Route::post('/products/register', [ProductController::class, 'store'])->name('products.register.store'); //保存
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show'); //商品詳細
Route::get('/products/search', [ProductController::class, 'search']); //検索
Route::patch('/products/{productId}/update', [ProductController::class, 'update']); //商品更新
Route::delete('/products/{productId}/delete', [ProductController::class, 'destroy']); //削除

