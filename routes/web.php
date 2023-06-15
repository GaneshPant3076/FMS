<?php

use Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin/dash', [AdminController::class, 'index']);
Route::get('/',[LoginController::class,'index']);
Route::resource('admin/user','\App\Http\Controllers\Admin\UserController');
// Route::resource('admin/blog', '\App\Http\Controllers\Admin\BlogController');
