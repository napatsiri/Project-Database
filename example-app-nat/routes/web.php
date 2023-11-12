<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerCRUDController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController; 
use Illuminate\Support\Facades\DB;
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

Route::resource('customers', CustomerCRUDController::class);

Route::get('customer/{id}',[CustomerCRUDController::class, 
'fetchTaxByCustID'])->name('show.tax');

Route::get('/post/{id}/comments', [PostController::class,'getCommentsByPost']);

Route::get('/add-users',[RoleController::class,'addUsers']);

Route::get('/rolesbyuser/{id}',[RoleController::class,'getAllRolesByUser']); 
Route::get('/usersbyrole/{id}',[RoleController::class,'getAllUsersByRole']);

Route::get('/getallrows',[UserController::class,'index' ]);
Route::get('/getallusers', function () { 
    $users = DB::table('users')->get(); 
    foreach ($users as $user) { 
        echo $user->name . "<br>"; } 
    });
Route::get('/getallnames' ,[UserController::class,'getnames']);
Route::get('/customer-email', function ()   
{    
    return view('request-form');  
})->name('request-customer-email'); 
Route::post('/customer-email', [UserController::class, 'getCustomerEmail'])->name('get-customer-email');