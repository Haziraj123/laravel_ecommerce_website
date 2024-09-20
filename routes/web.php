<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CashOnDeliveryController;
use App\Http\Middleware\Admin;

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

// for stripe / cash on delievery routes
Route::get('/stripecheckout', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');

Route::post('/Cod', [CashOnDeliveryController::class, 'Cod'])->name('Cod');
Route::get('/order-complete', [CashOnDeliveryController::class, 'orderComplete'])->name('home.order_complete');







Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified')->name('redirect');  //for admin and user dashboard

 Route::get('/',[HomeController::class,'index']);    // For index page

 Route::get('/about', [HomeController::class, 'about'])->name('about');
 Route::get('/product_details/{id}',[HomeController::class, 'product_details']);
 Route::get('/add_cart/{productId}', [HomeController::class, 'add_cart']);
 Route::get('/cart',[HomeController::class,'cart'])->name('home.cart');   // show products in cart
 Route::get('/delete_product/{id}',[HomeController::class,'deleteProduct']); // delete products in cart
 Route::get('/checkout', [HomeController::class,'checkout'])->name('checkout'); // move to in check-out page
 Route::get('/order_complete', [HomeController::class,'ordercomplete'])->name('order_complete');
 Route::get('/my_order', [HomeController::class,'my_order'])->name('my_order');
 Route::get('/cancel_order/{id}', [HomeController::class,'cancel_order'])->name('cancel_order');
 Route::get('remove_order/{id}', [HomeController::class, 'remove_order'])->name('remove_order');
 Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
 Route::get('/search', [HomeController::class, 'search'])->name('product.search');




// Admin routes

Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
Route::post('/admin/settings/update', [AdminController::class, 'updateSettings'])->name('admin.updateSettings');

 Route::get('/category',[AdminController::class,'category'])->name('admin.category');    //For Category
 Route::post('/add_category',[AdminController::class,'add_category'])->name('admin.add_category'); 
 Route::delete('/delete_category/{id}',[AdminController::class,'deleteCategory']);

 Route::get('/add_product',[AdminController::class,'view_product'])->name('admin.add_product');    // for add product
 Route::post('/add_product',[AdminController::class,'add_product']);

 Route::get('/show_product',[AdminController::class,'show_products'])->name('admin.show_product');   // for show products
 Route::get('/update_product/{id}', [AdminController::class, 'edit_product']);  // for edit
 Route::delete('/delete_product/{id}',[AdminController::class, 'delete_product']); // for delete

 Route::put('/confirm_update_product/{id}', [AdminController::class, 'confirm_update_product']);  //for update product

 Route::get('/orders',[AdminController::class,'orders'])->name('admin.orders');
 Route::get('/order_items',[AdminController::class,'order_items'])->name('admin.order_items'); 
 Route::get('/on_the_way/{id}', [AdminController::class, 'on_the_way'])->name('on_the_way'); // update delivery status 
 Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered'); 
 Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);
 
 

 
    


