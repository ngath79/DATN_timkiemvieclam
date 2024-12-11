<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function manage()
    {
        // Lấy danh sách các bài đăng tuyển của nhà tuyển dụng hiện tại
        $job_posts = JobPost::all();

        // Trả về view quản lý việc làm với dữ liệu
        return view('job_manager_employer', compact('job_posts'));
    }

    // Hiển thị form tạo bài đăng tuyển
    public function create()
    {
        return view('create_job_post');
    }

    // Xử lý lưu bài đăng tuyển mới
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'position' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'deadline' => 'required|date|after:today',
            'description' => 'required|string',
            'requirements' => 'required|string',
        ]);

        // Lưu bài đăng tuyển vào database
        JobPost::create([
            'id' => auth()->id(),
            'position' => $request->position,
            'quantity' => $request->quantity,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'status' => 'Active', // Mặc định trạng thái là "Active"
        ]);

        // Chuyển hướng về trang quản lý việc làm
        return redirect()->route('job_manager_employer')->with('success', 'Bài đăng tuyển dụng đã được tạo thành công!');
    }

    public function edit($id)
{
    // Lấy bài đăng công việc theo ID
    $jobPost = JobPost::findOrFail($id);

    // Trả về view edit_job_employer với thông tin bài đăng
    return view('edit_job_employer', compact('jobPost'));
}

public function update(Request $request, $id)
{
    // Xác thực dữ liệu
    $validated = $request->validate([
        'position' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'deadline' => 'required|date|after:today',
        'description' => 'required|string',
        'requirements' => 'required|string',
    ]);

    // Lấy bài đăng công việc theo ID
    $jobPost = JobPost::findOrFail($id);

    // Cập nhật thông tin bài đăng
    $jobPost->update($validated);

    // Chuyển hướng về trang quản lý bài đăng với thông báo thành công
    return redirect()->route('job_manager_employer')->with('success', 'Cập nhật bài đăng thành công!');
}

public function show($id)
{
    // Lấy thông tin bài đăng tuyển dụng theo id
    $jobPost = JobPost::findOrFail($id);

    // Trả về view hiển thị chi tiết bài đăng
    return view('job_detail_employer', compact('jobPost'));
}

}
