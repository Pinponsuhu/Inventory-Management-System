<?php

use App\Http\Controllers\AuthLogin;
use App\Http\Controllers\NavigateController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [NavigateController::class, 'dashboard']);
Route::get('/inventory', [NavigateController::class, 'inventory']);
Route::get('/item/more/{id}', [NavigateController::class, 'item_details']);
Route::post('/add/item', [NavigateController::class, 'add_item']);
Route::post('/add/user', [NavigateController::class, 'add_user']);
Route::get('/finish/item', [NavigateController::class, 'finished']);
Route::get('/history',[NavigateController::class, 'history']);
Route::post('/assign/item', [NavigateController::class, 'assign_item']);
Route::get('/report',[NavigateController::class, 'report']);
Route::get('/all/users',[NavigateController::class, 'all_users']);
Route::get('/generate/report',[NavigateController::class, 'generate_report']);
Route::get('/login',[AuthLogin::class, 'login']);
Route::post('/login',[AuthLogin::class, 'logining']);
Route::get('/reset/password/{id}',[NavigateController::class, 'reset_password']);
Route::get('/delete/user/{id}',[NavigateController::class, 'delete_user']);
Route::get('/logout',[NavigateController::class, 'logout']);
Route::get('/change/password',[NavigateController::class, 'change_password']);
Route::post('/change/password',[NavigateController::class, 'change_pwd']);