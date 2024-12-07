<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    // Hiển thị form đăng nhập cho user
    public function showLoginForm()
    {
        return view('auth.login_user');
    }

    // Xử lý đăng nhập cho user
    public function login(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Thực hiện đăng nhập
        if (Auth::guard('web')->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return redirect()->route('home_user');
        }

        // Đăng nhập không thành công
        return back()->with('error', 'Thông tin đăng nhập không chính xác');
    }

    // Đăng xuất user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
