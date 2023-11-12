<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get-cust-from-menu/{menu_name}',[OrderController::class,'get_customer_name']);
Route::get('/count-menus',[OrderController::class,'count_menus']);
Route::get('/list_menus', [OrderController::class, 'list_menus']);
Route::get('/high_price', [OrderController::class, 'high_price']);