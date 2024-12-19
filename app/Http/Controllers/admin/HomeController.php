<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('admin.index');
        }

        auth()->logout();

        // Xóa tất cả session
        session()->flush();
        return view('website.index');
    }

}
