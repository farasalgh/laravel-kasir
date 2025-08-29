<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Auth routes (login / logout)
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Crud user (admin only)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');

    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
});

// Auth register
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// Admin routes
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', [DashboardController::class,'admin'])->name('admin.dashboard');

// Kasir routes
Route::middleware(['auth', 'role:kasir'])->get('/kasir/dashboard', [DashboardController::class,'kasir'])->name('kasir.dashboard');

// Transaksi routes (both admin and kasir)
Route::resource('produk', ProdukController::class);
Route::resource('transaksi', TransaksiController::class);


