<?php

use App\Http\Controllers\Auth\LoginEmployerController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterEmployerController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Employer\AccountController;
use App\Http\Controllers\Employer\CandidateController;
use App\Http\Controllers\Employer\CompanyController;
use App\Http\Controllers\Employer\DashboardEmployerController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\Employer\RecruitmentManagementController;
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
Route::post('logout_employer', [LoginEmployerController::class, 'logout'])->name('logout_employer');

// Định nghĩa route cho dashboard của user
Route::get('/home_user', [UserController::class, 'index'])->name('home_user');
// Định nghĩa route cho dashboard của employer
Route::get('/home_employer', [EmployerController::class, 'index'])->name('home_employer');

// Route để hiển thị form đăng nhập
Route::get('/login/employer', [LoginEmployerController::class, 'showLoginForm'])->name('login_employer.form');

// Route để xử lý đăng nhập
Route::post('/login/employer', [LoginEmployerController::class, 'login'])->name('login_employer');


Route::prefix('employer')->middleware('auth:employer')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard_employer');
    })->name('dashboard_employer');

    Route::get('/manage-jobs', [JobController::class, 'manage'])->name('employer_manage_jobs');
    Route::get('/manage-candidates', [CandidateController::class, 'index'])->name('employer_manage_candidates');
    Route::get('/company-info', [CompanyController::class, 'info'])->name('info_company-employer');
    Route::get('/account-info', [AccountController::class, 'info'])->name('employer_account_info');

});
    Route::get('/employer/dashboard', [DashboardEmployerController::class, 'index'])->name('dashboard_employer');


    Route::get('/employer/company/edit', [App\Http\Controllers\Employer\CompanyController::class, 'edit'])->name('edit_company_employer');
    Route::post('/employer/company/update', [App\Http\Controllers\Employer\CompanyController::class, 'update'])->name('update_company_employer');

    Route::get('/employer/job/manage', [JobController::class, 'manage'])->name('job_manager_employer');

    // Hiển thị form tạo bài đăng tuyển
Route::get('/employer/job/create', [JobController::class, 'create'])->name('create_job_post');

// Lưu bài đăng tuyển mới
Route::post('/employer/job/store', [JobController::class, 'store'])->name('job.store');

    Route::get('/employer/recruitment-management', [RecruitmentManagementController::class, 'index'])->name('recruitment_management_employer');


    Route::get('/employer/recruitment-management', [RecruitmentManagementController::class, 'index'])->name('recruitment_management');
    Route::get('/employer/recruitment/create', [RecruitmentManagementController::class, 'create'])->name('create_job_post');
    Route::post('/employer/recruitment', [RecruitmentManagementController::class, 'store'])->name('store_job_post');
    Route::get('/employer/recruitment/{id}/edit', [RecruitmentManagementController::class, 'edit'])->name('edit_job_post');
    Route::put('/employer/recruitment/{id}', [RecruitmentManagementController::class, 'update'])->name('update_job_post');
    Route::delete('/employer/recruitment/{id}', [RecruitmentManagementController::class, 'destroy'])->name('delete_job_post');

    