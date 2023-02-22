<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\Role;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login',[Controllers\AuthController::class,'login'])->name('login');


Route::group(['middleware'=>'auth'],function(){
    Route::resource('role',Controllers\RoleController::class)->names('role');
});