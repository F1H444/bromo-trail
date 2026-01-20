<?php

use Illuminate\Support\Facades\Route;

use App\Models\Motor;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    // Fetch popular motors or just 3 random/latest for the teaser
    $motors = Motor::where('is_popular', true)->take(3)->get();
    // Fallback if no popular ones defined yet, just take 3
    if ($motors->isEmpty()) {
        $motors = Motor::take(3)->get();
    }

    return view('beranda', compact('motors'));
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/motor', function () {
    $motors = Motor::all();
    return view('motor.index', compact('motors'));
});

Route::get('/motor/{motor}', function (Motor $motor) {
    return view('motor.detail', compact('motor'));
})->name('motor.show');

use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\DashboardController;

// Auth Routes
Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomerAuthController::class, 'login']);
Route::get('/register', [CustomerAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [CustomerAuthController::class, 'register']);
Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('/forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

// Protected Routes
Route::middleware(['auth:pelanggan'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/bookings', [DashboardController::class, 'bookings'])->name('dashboard.bookings');
    Route::get('/dashboard/bookings/{id}', [DashboardController::class, 'showBooking'])->name('dashboard.bookings.show');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [DashboardController::class, 'updateProfile']);

    // Booking protected
    Route::get('/booking/{motor}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Payment protected
    Route::get('/pembayaran/{id}/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
});

Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/failed', [BookingController::class, 'failed'])->name('booking.failed');
Route::get('/pembayaran/{id}/success', [PembayaranController::class, 'success'])->name('pembayaran.success');

Route::get('/cara-sewa', function () {
    return view('cara-sewa');
});

Route::get('/spot-foto', function () {
    return view('spot-foto');
});

Route::get('/kontak', function () {
    return view('kontak');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Admin Auth
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');

    // Protected Admin Routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

        // CRUD Routes
        Route::resource('motor', App\Http\Controllers\Admin\MotorController::class);
        Route::resource('tambahan', App\Http\Controllers\Admin\TambahanController::class);

        // Pembayaran
        Route::get('/pembayaran', [App\Http\Controllers\Admin\PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::get('/pembayaran/{id}', [App\Http\Controllers\Admin\PembayaranController::class, 'show'])->name('pembayaran.show');
        Route::post('/pembayaran/{id}/verify', [App\Http\Controllers\Admin\PembayaranController::class, 'verify'])->name('pembayaran.verify');

        // Penyewaan (Rental Management)
        Route::get('/penyewaan', [App\Http\Controllers\Admin\PenyewaanController::class, 'index'])->name('penyewaan.index');
        Route::get('/penyewaan/{id}', [App\Http\Controllers\Admin\PenyewaanController::class, 'show'])->name('penyewaan.show');
        Route::patch('/penyewaan/{id}/status', [App\Http\Controllers\Admin\PenyewaanController::class, 'updateStatus'])->name('penyewaan.updateStatus');

        // Cek Kondisi
        Route::resource('cek-kondisi', App\Http\Controllers\Admin\CekKondisiController::class);

        // Laporan
        Route::get('/laporan', [App\Http\Controllers\Admin\LaporanController::class, 'index'])->name('laporan.index');
    });
});
