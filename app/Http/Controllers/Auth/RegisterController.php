<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Xác thực dữ liệu từ form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:5|confirmed',
            'role' => 'required|in:user,employer', // Chỉ cho phép các vai trò cụ thể
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'], // Lưu vai trò
        ]);

        // Tự động đăng nhập sau khi đăng ký
        auth()->login($user);

        // Điều hướng đến dashboard tương ứng
        return redirect()->route($user->role . 'user.dashboard');
    }
}

