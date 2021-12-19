<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

//backend start
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;

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


Route::get('/', [AuthController::class, 'login']);

Route::post('web_login', [AuthController::class, 'post_login']);

Route::get('logout', [AuthController::class, 'logout']);

// backend start
Route::group(['middleware' => 'admin'], function(){
    
    //dashboard start
    Route::prefix('admin/dashboard')->group(function () {
        Route::get('', [DashboardController::class, 'dashboard_index']);
    });
    //dashboard end

    //user start
    Route::prefix('admin/user')->group(function () {
        Route::get('', [UserController::class, 'user_index']);
        Route::get('add', [UserController::class, 'user_create']);
        Route::post('add', [UserController::class, 'user_store']);
        Route::get('edit/{id}', [UserController::class, 'user_edit']);
        Route::post('edit/{id}', [UserController::class, 'user_update']);
        Route::get('delete/{id}', [UserController::class, 'user_destroy']);
    });
    //user end

    //product start
    Route::prefix('admin/product')->group(function () {
        Route::get('', [ProductController::class, 'product_index']);
        Route::get('add', [ProductController::class, 'product_create']);
        Route::post('add', [ProductController::class, 'product_store']);
        Route::get('edit/{id}', [ProductController::class, 'product_edit']);
        Route::post('edit/{id}', [ProductController::class, 'product_update']);
        Route::get('delete/{id}', [ProductController::class, 'product_destroy']);
        Route::get('import', [ProductController::class, 'product_add_import']);
        Route::post('import', [ProductController::class, 'product_store_import']);
        Route::get('delete_product_multi', [ProductController::class, 'delete_product_multi']);
           
        Route::get('export', [ProductController::class, 'product_excel_export']);
    });    
    //product end


 });