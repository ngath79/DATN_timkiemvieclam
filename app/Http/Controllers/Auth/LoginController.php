<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Xác thực dữ liệu
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Đăng nhập
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Điều hướng dựa trên vai trò của người dùng
            $role = Auth::user()->role;
            return redirect()->route($role . '.dashboard');
        }

        // Nếu đăng nhập thất bại
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ])->withInput();
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Điều hướng về trang chủ sau khi đăng xuất
    }
}
