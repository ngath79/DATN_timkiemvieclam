<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employer;  // Hoặc model mà bạn sử dụng cho nhà tuyển dụng
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterEmployerController extends Controller
{
    // Hiển thị form đăng ký nhà tuyển dụng
    public function showRegistrationForm()
    {
        return view('auth.register_employer');
    }

    // Xử lý đăng ký nhà tuyển dụng
    public function register(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employers,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Tạo nhà tuyển dụng mới
        Employer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Chuyển hướng đến trang đăng nhập sau khi đăng ký thành công
        return redirect()->route('home_employer')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập!');
    }
}
