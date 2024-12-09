<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoEmployer extends Controller
{
    // Phương thức để hiển thị thông tin công ty
    public function info()
    {
        // Lấy thông tin công ty từ model hoặc từ thông tin người dùng đang đăng nhập
        $employer = Auth::guard('tk_employer')->user(); // Lấy người dùng đang đăng nhập với guard tk_employer

        // Trả về view với thông tin công ty
        return view('employer_account_info', compact('employer'));
    }
}
