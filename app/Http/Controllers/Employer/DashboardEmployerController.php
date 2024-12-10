<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\InfoEmployer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardEmployerController extends Controller
{
    public function index()
    {
        // Lấy thông tin công ty dựa trên nhà tuyển dụng đang đăng nhập
        $dashboard_employer_company = InfoEmployer::all();

        // Trả về view với thông tin công ty
        return view('dashboard_employer', compact('dashboard_employer_company'));
    }

}
