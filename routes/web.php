<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\PromotionController as AdminPromotionController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\VoucherController as AdminVoucherController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Customer Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions.index');
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::post('/booking/apply-voucher', [BookingController::class, 'applyVoucher'])->name('booking.applyVoucher');
Route::get('/booking/success', [BookingController::class, 'success'])->name('booking.success');
Route::post('/booking/webhook', [BookingController::class, 'webhook'])->name('booking.webhook');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('/services', AdminServiceController::class);
    Route::patch('/services/{service}/status', [AdminServiceController::class, 'updateStatus'])->name('services.updateStatus');
    Route::resource('/promotions', AdminPromotionController::class);
    Route::patch('/promotions/{promotion}/status', [AdminPromotionController::class, 'updateStatus'])->name('promotions.updateStatus');
    Route::resource('/vouchers', AdminVoucherController::class);
    Route::resource('/bookings', AdminBookingController::class)->except(['create', 'store']);
    Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.updateStatus');

    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Temporary Migration & Cache Helper Routes
Route::get('/run-artisan-migrate', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return 'Database migrated successfully!<br><pre>' . \Illuminate\Support\Facades\Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/run-artisan-clear', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        \Illuminate\Support\Facades\Artisan::call('route:clear');
        return 'All caches cleared successfully!';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/run-artisan-storage-link', function () {
    try {
        $link = public_path('storage');
        $output = '';

        if (file_exists($link) || is_link($link)) {
            if (is_link($link)) {
                unlink($link);
                $output .= "Removed existing symbolic link at $link.<br>";
            } else {
                $backup = $link . '_old_' . time();
                rename($link, $backup);
                $output .= "Renamed existing physical folder $link to $backup.<br>";
            }
        }

        \Illuminate\Support\Facades\Artisan::call('storage:link');
        $output .= 'Storage link created successfully!<br><pre>' . \Illuminate\Support\Facades\Artisan::output() . '</pre>';
        return $output;
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
