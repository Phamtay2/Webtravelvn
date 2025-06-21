<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TourPriceController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use Spatie\Permission\Middlewares\RoleMiddleware;



Route::get('/', [IndexController::class, 'index'])->name('hom');
Route::get('/tour/{slug}', [IndexController::class, 'tour'])->name('tour');
Route::get('/chi-tiet-tour/{slug}', [IndexController::class, 'detail_tour'])->name('chi-tiet-tour');




//categories


// Auth for user
Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'check_login']);

Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/register', [UserController::class, 'check_register']);

Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::resource('booking', BookingController::class);
// Trang admin dashboard: admin và editor đều vào được
Route::middleware(['auth', CheckRole::class . ':admin,editor,categoryMng,tourMng'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Các resource mà admin và editor đều được phép quản lý
    Route::resource('categories', CategoriesController::class);

    //tours
    Route::resource('tours', ToursController::class);
    Route::get('/get-tour-details', [TourPriceController::class, 'getTourDetails']);
    //gallery
    Route::resource('gallery', GalleryController::class);
    //schedule
    Route::resource('schedule', ScheduleController::class);
    //booking
    Route::resource('booking', BookingController::class);
    //tourprice
    Route::resource('tourprice', TourPriceController::class);
});

// Quản lý người dùng chỉ cho admin
Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['create', 'store', 'show']);
});

// admin và editor đều quản lý categories và tours
Route::middleware(['auth', CheckRole::class . ':admin,editor,categoryMng'])->group(function () {
    Route::resource('categories', CategoriesController::class);
});

Route::middleware(['auth', CheckRole::class . ':admin,editor,tourMng'])->group(function () {
    Route::resource('tours', ToursController::class);
});
Route::middleware(['auth', CheckRole::class . ':admin,editor,categoryMng,tourMng,viewer'])->group(function () {
        Route::resource('booking', BookingController::class);

});
use Illuminate\Support\Facades\Artisan;

Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return '✅ Đã clear config và cache!';
});











