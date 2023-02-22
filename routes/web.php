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
    Route::post('check-create',[Controllers\CheckPermissionController::class,'checkCreatePermission']);
    Route::put('check-update',[Controllers\CheckPermissionController::class,'checkUpdatePermission']);
    Route::get('check-view',[Controllers\CheckPermissionController::class,'checkViewPermission']);
    Route::delete('check-delete',[Controllers\CheckPermissionController::class,'checkDeletePermission']);
    Route::post('assign-role',[Controllers\RoleController::class,'assignRole']);
    Route::resource('role',Controllers\RoleController::class);
    Route::resource('permission',Controllers\PermissionController::class);
});