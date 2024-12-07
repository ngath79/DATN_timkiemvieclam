<?php

use App\Http\Controllers\Auth\LoginEmployerController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterEmployerController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return view('home'); // Trỏ tới view 'home.blade.php'
})->name('home');
// Route cho đăng ký người dùng
Route::get('/register/user', [RegisterUserController::class, 'showRegistrationForm'])->name('register.user.form');
Route::post('/register/user', [RegisterUserController::class, 'register'])->name('register.user');

// Route cho đăng ký nhà tuyển dụng
Route::get('/register/employer', [RegisterEmployerController::class, 'showRegistrationForm'])->name('register.employer.form');
Route::post('/register/employer', [RegisterEmployerController::class, 'register'])->name('register.employer');
// Route cho trang đăng nhập
Route::get('/login', [LoginUserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginUserController::class, 'login'])->name('login');

Route::post('logout', function () {
    Auth::logout();  // Đăng xuất người dùng
    return redirect()->route('home');  // Chuyển hướng về trang chủ sau khi đăng xuất
})->name('logout');


// Hiển thị form đăng nhập cho user
Route::get('login/user', [LoginUserController::class, 'showLoginForm'])->name('login.user.form');

// Xử lý đăng nhập cho user
Route::post('login/user', [LoginUserController::class, 'login'])->name('login.user');
// Xử lý đăng nhập cho employer
Route::post('login/employer', [LoginUserController::class, 'login'])->name('login.employer');


// Đăng xuất
Route::post('logout', [LoginUserController::class, 'logout'])->name('logout');

// Định nghĩa route cho dashboard của user
Route::get('/home_user', [UserController::class, 'index'])->name('home_user');
// Định nghĩa route cho dashboard của employer
Route::get('/home_employer', [EmployerController::class, 'index'])->name('home_employer');

// Route để hiển thị form đăng nhập
Route::get('/login/employer', [LoginEmployerController::class, 'showLoginForm'])->name('login_employer.form');

// Route để xử lý đăng nhập
Route::post('/login/employer', [LoginEmployerController::class, 'login'])->name('login_employer');