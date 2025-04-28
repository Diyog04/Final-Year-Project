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
use App\Http\Controllers\BookingController;



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

Route::middleware('auth','role:admin')->group(function () {
    Route::get('/admindash', [AdminController::class, 'Admin']);
});



Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/search', [IndexController::class, 'search'])->name('event.search');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admindash', [AdminController::class, 'Admin']);
});


Route::get('/admindash', [AdminController::class, 'Admin']);


// Route::middleware('auth', 'role:vendor')->group(function () {
//     Route::get('/vendordash', [VendorController::class, 'Vendor']);
// });

// Route::middleware('auth', 'role:user')->group(function () {
//     Route::get('/userdash', [UserController::class, 'User']);
// });



// Booking routes
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/success', [BookingController::class, 'success'])->name('bookings.success');



Route::get('/admin/bookings', [AdminController::class, 'index'])->name('admin.bookings.index');
Route::patch('/bookings/{booking}/update-status', [AdminController::class, 'updateStatus'])
->name('bookings.update-status');

Route::get('/user/payments', [AdminController::class, 'showPayments'])->name('admin.payment');


// Notifications
// Mark single notification as read
Route::post('/notifications/{notification}/mark-as-read', function ($notificationId) {
    auth()->user()->notifications()->where('id', $notificationId)->update(['read_at' => now()]);
    return back();
})->name('notifications.markAsRead');

// Mark all notifications as read
Route::post('/notifications/mark-all-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return back();
})->name('notifications.markAllRead');




// payment
// Product detail route
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');

// Payment routes

Route::post('/payment/initiate/{bookingId}', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');
Route::get('/payment/success/callback', [PaymentController::class, 'handlePaymentSuccess'])->name('payment.success.callback');




Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::middleware('auth','role:vender')->group(function () {
    Route::get('/venderdash', [VenderController::class, 'Vender']);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/userdash', [UserController::class, 'User']);
});

Route::get('/user/recent-bookings', [UserController::class, 'showRecentBookings'])->name('user.recent-bookings');



Route::post('to-become-slider', [SliderController::class, 'Slider'])->name('slider.store');
Route::post('to-become-call', [CallController::class, 'Call'])->name('call.store');
Route::post('to-become-product', [ProductController::class, 'store'])->name('product.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';