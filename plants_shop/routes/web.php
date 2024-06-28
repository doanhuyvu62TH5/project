<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ContributeController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CustomerController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Home\AccountController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Home\HomeController;


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
    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::get('verify-account/{email}',[AccountController::class,'verify'])->name('account.verify');
    Route::post('/login', [AccountController::class,'check_login'])->name('account.check_login');

    Route::get('/register', [AccountController::class, 'register'])->name('account.register');
    Route::post('/register', [AccountController::class,'check_register'])->name('account.check_register');

    Route::group(['middleware' => 'customer'], function() {
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::put('/profile/{customer}/update-info', [AccountController::class,'UpdateProfileInfor'])->name('account.updateinfor');
        Route::put('/profile/{customer}/update-image', [AccountController::class,'UpdateProfileImg'])->name('account.updateimg');
        Route::delete('/profile/{customer}/delete-image', [AccountController::class,'DeleteProfileImg'])->name('account.deleteimg');
    });
   

    Route::get('/change-password', [AccountController::class, 'change_password'])->name('account.change_password');
    Route::post('/change-password', [AccountController::class,'check_change_password'])->name('account.check_change_password');

    Route::get('/forgot-password', [AccountController::class, 'forgot_password'])->name('account.forgot_password');
    Route::post('/forgot-password', [AccountController::class,'check_forgot_password'])->name('account.check_forgot_password');

    Route::get('/reset-password/{token}', [AccountController::class, 'reset_password'])->name('account.reset_password');
    Route::post('/reset-password/{token}', [AccountController::class, 'check_reset_password'])->name('account.check_reset_password');
});


Route::get('/products/category/{cat}', [HomeController::class, 'showProductsByCategory'])->name('home.category');
Route::get('/products/all', [HomeController::class, 'showAllProducts'])->name('products.all');
Route::get('/products/type/{type}', [HomeController::class, 'showProductsByType'])->name('products.byType');
Route::get('/product/{product}',[HomeController::class, 'showProduct'])->name('home.product');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/contact_us',[HomeController::class, 'contact'])->name('contact_us.index');
Route::post('/contact_us',[HomeController::class, 'contact_post'])->name('send');
Route::get('/blog', [HomeController::class, 'blog'])->name('home.blogs');
Route::get('/blog/{blog}', [HomeController::class, 'showBlogDetail'])->name('home.blog');
Route::post('/comments', [HomeController::class, 'comment_post'])->name('comments.post')->middleware('customer');
Route::delete('/delete/{comment}', [HomeController::class, 'delete_comment'])->name('delete.comment');



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
    Route::resource('/blog',BlogController::class);
    Route::resource('/comment',CommentController::class);
    Route::resource('/customer',CustomerController::class);

    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::post('orders/{order}/confirm', [OrderController::class, 'confirm'])->name('admin.orders.confirm');
    Route::post('orders/{order}/mark-as-packed', [OrderController::class, 'markAsPacked'])->name('admin.orders.markAsPacked');
    Route::post('orders/{order}/mark-as-shipping', [OrderController::class, 'markAsShipping'])->name('admin.orders.markAsShipping');
    Route::post('orders/{order}/mark-as-delivered', [OrderController::class, 'markAsDelivered'])->name('admin.orders.markAsDelivered');
    Route::delete('orders/{order}/cancel', [OrderController::class, 'cancel'])->name('admin.orders.cancel');
    Route::post('admin/orders/{order}/mark-as-paid', [OrderController::class, 'markAsPaid'])->name('admin.orders.markAsPaid');

    Route::get('contributes', [ContributeController::class, 'index'])->name('admin.contributes.index');
    Route::delete('contibutes/{contribute}', [ContributeController::class, 'destroy'])->name('admin.contributes.delete');
});


Route::group(['prefix' => 'cart', 'middleware' => 'customer'], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index'); // Hiển thị giỏ hàng
    Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add'); // Thêm sản phẩm vào giỏ hàng
    Route::patch('/update/{product}', [CartController::class, 'update'])->name('cart.update'); // Cập nhật sản phẩm trong giỏ hàng
    Route::delete('/delete/{product}', [CartController::class, 'delete'])->name('cart.delete'); // Xóa sản phẩm khỏi giỏ hàng
    Route::delete('/clear', [CartController::class, 'clear'])->name('cart.clear'); // Xóa toàn bộ giỏ hàng
});

Route::group(['prefix' => 'order','middleware' => 'customer'], function() {
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('order.checkout');
    Route::get('/history', [CheckoutController::class, 'history'])->name('order.history');
    Route::get('/detail/{order}', [CheckoutController::class, 'detail'])->name('order.detail');
    Route::post('/checkout', [CheckoutController::class, 'post_checkout'])->name('checkout');
    Route::get('/order/{order}/cancel', [CheckoutController::class, 'cancel'])->name('order.cancel');
});







