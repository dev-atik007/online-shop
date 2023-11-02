<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProductController;
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
    Route::get('/logout', [AdminDashboardController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Category Route
    Route::get('/category-list', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/category-create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category-update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category-view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');
    Route::get('/category-delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

    // Brand Route
    Route::get('/brand-list', [BrandController::class, 'index'])->name('admin.brand.list');
    Route::get('/brand-create', [BrandController::class, 'create'])->name('admin.brand.create');
    Route::post('/brand-store', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::get('/brand-edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::put('/brand-update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::get('/brand-view/{id}', [BrandController::class, 'view'])->name('admin.brand.view');
    Route::get('/brand-delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');

    // Product Route
    Route::get('/product-list', [ProductController::class, 'index'])->name('admin.product.list');
    Route::get('/product-create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product-store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/-edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');

    // Settings Route
    Route::get('/setting-details', [SettingController::class, 'index'])->name('admin.setting.detail');
    Route::get('/setting-create', [SettingController::class, 'create'])->name('admin.setting.create');
    Route::post('/setting-store', [SettingController::class, 'store'])->name('admin.setting.store');
    Route::get('/setting-edit/{id}', [SettingController::class, 'edit'])->name('admin.setting.edit');
    Route::put('/setting-update/{id}', [SettingController::class, 'update'])->name('admin.setting.update');

    //Customer Route
    Route::get('/customer-list', [CustomerController::class, 'list'])->name('admin.customer.list');
    Route::get('/customer-create', [CustomerController::class, 'create'])->name('admin.customer.create');
    Route::post('/customer-store', [CustomerController::class, 'store'])->name('admin.customer.store');
    Route::get('customer-edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
    
});



Route::get('/', function () {
    return view('welcome');
});

