<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employer\info_employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InfoEmployer;

class CompanyController extends Controller
{
    public function info()
    {
        // Lấy thông tin công ty từ model hoặc từ thông tin người dùng đang đăng nhập
        $info_employer = InfoEmployer::all(); // Lấy người dùng đang đăng nhập với guard tk_employer

        // Trả về view với thông tin công ty
        return view('info_company-employer', compact('info_employer'));
    }
}
