<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function () {return view('frontend.index');})->name('homepage');

Route::middleware(['auth','checkAdmin:admin'])->group(function (){
    Route::get('/admin/dashboard/',[AdminController::class,'adminDashboard'])->name('admin.Dashboard');
    Route::get('/admin/logout',[AdminController::class,'adminDestroy'])->name('admin.logout');
    Route::get('/product/inactive/{id}',[ProductController::class,'ProductInactive'])->name('product.inactive');
    Route::get('/product/active/{id}',[ProductController::class,'ProductActive'])->name('product.active');
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);

    Route::get('/purchase/{productId}',[ProductController::class,'purchaseProduct'])->name('product.purchase');
});

Route::middleware(['auth','role:user'])->group(function (){
    Route::get('/dashboard', function () {return view('users.admin_dashboard');})->name('dashboard');
    Route::get('/user/logout',[UserController::class,'userDestroy'])->name('user.logout');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
