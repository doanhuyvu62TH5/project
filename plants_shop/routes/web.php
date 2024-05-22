<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;


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

Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::group(['prefix' => 'account'], function(){

    Route::get('/login', [AccountController::class, 'login'])->name('account.login');
    Route::get('verify-account/{email}',[AccountController::class,'verify'])->name('account.verify');
    Route::post('/login', [AccountController::class,'check_login'])->name('account.check_login');

    Route::get('/register', [AccountController::class, 'register'])->name('account.register');
    Route::post('/register', [AccountController::class,'check_register'])->name('account.check_register');

    Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::post('/profile', [AccountController::class,'check_profile']);
    
    Route::get('/change-password', [AccountController::class, 'change_password'])->name('account.change_password');
    Route::post('/change-password', [AccountController::class,'check_change_password']);

    Route::get('/forgot-password', [AccountController::class, 'login'])->name('account.forgot_password');
    Route::post('/forgot-password', [AccountController::class,'check_forgot_password']);

    Route::get('/reset-password', [AccountController::class, 'reset_password'])->name('account.reset_password');
    Route::post('/reset-password', [AccountController::class,'check_reset-password']);
});
// Route::get('/products/category/{cat}', [HomeController::class, 'showProducts'])->name('home.category');
// Route::get('/products/all', [HomeController::class, 'showProducts'])->name('products.all');
// Route::get('/products/type/{type}', [HomeController::class, 'showProducts'])->name('products.byType');
// Route::get('/product/{product}',[HomeController::class, 'showProduct'])->name('home.product');
Route::get('/products/category/{cat}', [HomeController::class, 'showProductsByCategory'])->name('home.category');
Route::get('/products/all', [HomeController::class, 'showAllProducts'])->name('products.all');
Route::get('/products/type/{type}', [HomeController::class, 'showProductsByType'])->name('products.byType');

Route::get('/product/{product}',[HomeController::class, 'showProduct'])->name('home.product');





// Route::prefix('auth')->group(function () {
//     Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [AuthController::class, 'login'])->name('loginAction');
//     Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/register', [AuthController::class, 'register'])->name('registerSave');
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// });
Route::controller(AdminController::class)->group(function(){
    Route::get('admin/login', 'showLoginForm')->name('admin.login');
    Route::post('admin/login', 'login')->name('loginAction');
    Route::get('admin/register', 'showRegistrationForm')->name('admin.register');
    Route::post('admin/register', 'register')->name('registerSave');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){
    Route::get('/',[AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::resource('/category',CategoryController::class);
    Route::resource('/product',ProductController::class);
});




