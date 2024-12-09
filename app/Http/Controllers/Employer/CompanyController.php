<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function info()
    {
        // Lấy thông tin công ty từ model hoặc từ thông tin người dùng đang đăng nhập
        $employer = Auth::guard('employer')->user(); // Lấy người dùng đang đăng nhập với guard tk_employer

        // Trả về view với thông tin công ty
        return view('info_company-employer', compact('employer'));
    }
}