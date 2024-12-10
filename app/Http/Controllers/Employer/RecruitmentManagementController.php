<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class RecruitmentManagementController extends Controller
{
    public function index()
    {
        // Lấy danh sách bài đăng tuyển của nhà tuyển dụng đang đăng nhập
        $recruitment_posts = JobPost::where('employer_id', auth()->id())->get();

        return view('recruitment_management', compact('recruitment_posts'));
    }

    public function create()
{
    return view('create_job_post');
}

public function store(Request $request)
{
    $request->validate([
        'position' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'deadline' => 'required|date',
    ]);

    JobPost::create([
        'employer_id' => auth()->id(),
        'position' => $request->position,
        'quantity' => $request->quantity,
        'deadline' => $request->deadline,
        'status' => 'Chờ duyệt',
    ]);

    return redirect()->route('recruitment_management')->with('success', 'Bài đăng tuyển đã được tạo.');
}

public function edit($id)
{
    $job_post = JobPost::where('id', $id)->where('employer_id', auth()->id())->firstOrFail();

    return view('edit_job_post', compact('job_post'));
}

public function update(Request $request, $id)
{
    $job_post = JobPost::where('id', $id)->where('employer_id', auth()->id())->firstOrFail();

    $request->validate([
        'position' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'deadline' => 'required|date',
    ]);

    $job_post->update([
        'position' => $request->position,
        'quantity' => $request->quantity,
        'deadline' => $request->deadline,
    ]);

    return redirect()->route('recruitment_management')->with('success', 'Bài đăng tuyển đã được cập nhật.');
}

public function destroy($id)
{
    $job_post = JobPost::where('id', $id)->where('employer_id', auth()->id())->firstOrFail();
    $job_post->delete();

    return redirect()->route('recruitment_management')->with('success', 'Bài đăng tuyển đã được xóa.');
}

}
