<?php

use App\Http\Controllers\Admin\AdminController;
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

// Route::get('/', function () {
//     return view('layout.dashboard');
// });


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
});

