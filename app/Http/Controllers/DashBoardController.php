<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashBoardController extends Controller
{
    // Prevent guest from going to dashboard
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->role == 'student') {
            return view('admin.dashboard.index');
        };
        return view('admin.dashboard.index');
    }

    public function create(){
        return view('admin.course.create');
    }
}
