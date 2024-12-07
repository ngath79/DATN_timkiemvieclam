<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register_user');
    }

    // Xử lý đăng ký người dùng
    public function register(Request $request)
    {
        // Xác thực dữ liệu người dùng nhập vào
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // password_confirmation để xác nhận mật khẩu
        ]);

        // Tạo người dùng mới trong cơ sở dữ liệu
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Mã hóa mật khẩu
            'role' => 'user',  // Giả sử bạn muốn đặt mặc định là "user"
        ]);

        // Đăng nhập người dùng ngay sau khi đăng ký
        Auth::login($user);

        // Chuyển hướng người dùng đến trang chủ với thông báo thành công
        return redirect()->route('home_user')->with('success', 'Đăng ký thành công!');
    }
}
