<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::prefix('public')->group(function () {
    Route::view('/product/index', 'public.index');
    Route::get('/product/show/{productId}', function ($productId) {
        return View::make('public.show', compact('productId'));
    });
});

Route::prefix('vendor')->group(function () {
    Route::get('{vendorId}/product/create/', function ($vendorId) {
        return View::make('vendor.products.create', compact('vendorId'));
    });

    Route::get('{vendorId}/product/show/{productId}', function ($vendorId, $productId) {
        return View::make('vendor.products.show', compact('vendorId', 'productId'));
    });

    Route::get('{vendorId}/product/index/', function ($vendorId) {
        return View::make('vendor.products.index', compact('vendorId'));
    });
});

Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');
