<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        return view('home_employer');  // Trả về view cho dashboard của employer
    }
}
