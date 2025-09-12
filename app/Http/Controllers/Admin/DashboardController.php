<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Anda bisa menambahkan logic di sini nanti,
        // misalnya mengambil data total pesanan, dll.
        return view('admin.dashboard');
    }
}