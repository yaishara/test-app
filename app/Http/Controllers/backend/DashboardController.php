<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:dashboard-list', ['only' => ['index']]);
    }
    public function index()
    {
        return view('dashboard');
    }
}
