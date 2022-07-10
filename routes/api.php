<?php

use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


route::get('products', [ProductController::class, 'all']);
route::get('categories', [ProductCategoryController::class, 'all']);

route::post('register', [UserController::class, 'register']);
route::post('login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->group( function() {
    route::get('user', [UserController::class , 'fetch']);
    route::post('user', [UserController::class , 'updateProfile']);
    route::post('logout', [UserController::class , 'logout']);


    Route::post('transactions', [TransactionController::class, 'all']);
    Route::post('checkout', [TransactionController::class, 'checkout']);
});