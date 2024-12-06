<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); //Trang chủ chung
    }

    public function userDashboard()
    {
        return view('dashboards.user'); // Dashboard cho user
    }

    public function employerDashboard()
    {
        return view('dashboards.employer'); // Dashboard cho employer
    }

    public function adminDashboard()
    {
        return view('dashboards.admin'); // Dashboard cho admin
    }
}
