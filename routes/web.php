<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('admin/login', [AdminDashboardController::class, 'login'])->name('admin.login');
Route::post('admin/login-check', [AdminDashboardController::class, 'loginCheck'])->name('admin.login.check');

Route::group(['middleware'=>['auth', 'checkAdmin'], 'prefix'=>'admin'],function(){

    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    
});



Route::get('/', function () {
    return view('welcome');
});

