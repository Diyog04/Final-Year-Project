<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [IndexController::class, 'Index']);
Route::get('/about', [IndexController::class, 'About']);
Route::get('/blog', [IndexController::class, 'Blog']);
Route::get('/addtocart', [IndexController::class, 'Addtocart']);
Route::get('/create', [AdminController::class, 'Create']);
Route::get('/view', [AdminController::class, 'View']);
Route::get('/callcreate', [AdminController::class, 'Call']);
Route::get('/callview', [AdminController::class, 'Callview']);
Route::get('/productcreate', [AdminController::class, 'Product'])->name('product.create');
Route::get('/productview', [AdminController::class, 'Productview'])->name('product.view');
Route::get('/productedit', [AdminController::class, 'Productedit']);
Route::post('/store', [AdminController::class, 'store'])->name('news.store');
Route::get('/show', [AdminController::class, 'show'])->name('news.show'); 
Route::get('/edit/{id}', [AdminController::class, 'ProductEditY'])->name('product.edit'); 
Route::put('/update/{id}', [AdminController::class, 'update'])->name('product.update'); 
Route::delete('/delete/{id}', [AdminController::class, 'destroydel'])->name('product.destroy');  

// Route::get('/dash', function () {
//     return view('user/userdash');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/admindash', function () {
//     return view('Admin/admindashboard');
// })->middleware(['auth', 'verified'])->name('user');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/search', [EventController::class, 'search'])->name('event.search');
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::middleware('auth', 'role:admin')->group(function () {
//     Route::get('/admindash', [AdminController::class, 'Admin']);
// });


Route::get('/admindash', [AdminController::class, 'Admin']);


// Route::middleware('auth', 'role:vendor')->group(function () {
//     Route::get('/vendordash', [VendorController::class, 'Vendor']);
// });
 
// Route::middleware('auth', 'role:user')->group(function () {
//     Route::get('/userdash', [UserController::class, 'User']);
// });


// payment
// Product detail route
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');

// Payment routes
Route::post('/initiate-payment/{productId}', [PaymentController::class, 'initiatePayment'])->name('initiate.payment');
Route::get('/payment-success', [PaymentController::class, 'handlePaymentSuccess'])->name('payment.success');



Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::middleware('auth','role:vender')->group(function () {
    Route::get('/venderdash', [VenderController::class, 'Vender']);
});

Route::middleware('auth','role:user')->group(function () {
    Route::get('/userdash', [UserController::class, 'User']);
});

Route::post('to-become-slider', [SliderController::class, 'Slider'])->name('slider.store');
Route::post('to-become-call', [CallController::class, 'Call'])->name('call.store');
Route::post('to-become-product', [ProductController::class, 'Product'])->name('product.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';