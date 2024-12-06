<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Hiển thị form đăng ký
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Xử lý dữ liệu đăng ký
Route::post('/register', [RegisterController::class, 'register']);

// Dashboard cho User
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboards.user'); // Tạo view này
    })->name('user.dashboard');
});

// Dashboard cho Employer
Route::middleware(['auth', 'role:employer'])->group(function () {
    Route::get('/employer/dashboard', function () {
        return view('dashboards.employer'); // Tạo view này
    })->name('employer.dashboard');
});

// Dashboard cho Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboards.admin'); // Tạo view này
    })->name('admin.dashboard');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Xử lý đăng nhập
Route::post('/login', [LoginController::class, 'login']);

// Xử lý đăng xuất
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
