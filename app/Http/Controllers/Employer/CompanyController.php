<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employer\info_employer_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InfoEmployer;

class CompanyController extends Controller
{
    public function info()
    {
        
        $info_employer = InfoEmployer::all();

        // Trả về view với thông tin công ty
        return view('info_company-employer', compact('info_employer'));
    }

    

    //Cập nhật thông tin công ty
    public function edit() {
        $edit_employer = InfoEmployer::all(); 
        return view('edit_company_employer', compact('edit_employer'));
    }

    public function update(Request $request)
    {
        $employer = InfoEmployer::all()->first(); // Lấy thông tin nhà tuyển dụng đã đăng nhập

    // Validate dữ liệu
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'nullable|string|max:255',
            'company_phone' => 'nullable|string|max:255',
            'company_website' => 'nullable|string|max:255',
            'masothue_website' => 'nullable|string|max:255',
            'loaihinhhoatdong_website' => 'nullable|string|max:255',
        ]);

    // Cập nhật thông tin
        $employer->update([
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'company_phone' => $request->company_phone,
            'company_website' => $request->company_website,
            'masothue_website' => $request->masothue_website,
            'loaihinhhoatdong_website' => $request->loaihinhhoatdong_website,
        ]);

        return redirect()->route('info_company-employer')->with('success', 'Cập nhật thông tin công ty thành công!');
    }
}
