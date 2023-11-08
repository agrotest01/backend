<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\Order\Presentation\Http\OrderController;
use Src\Product\Presentation\Http\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::group(
    [
        'prefix' => 'product',
    ],
    function () {
        Route::get('', [ProductController::class, 'getList']);
        Route::get('find/price/{id}', [ProductController::class, 'findPriceById']);
    },
);



Route::group(
    [
        'prefix' => 'order',
    ],
    function () {
        Route::post('final-price', [OrderController::class, 'findFinalPrice']);
    },
);
