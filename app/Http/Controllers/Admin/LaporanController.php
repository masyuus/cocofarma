<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.pages.laporan.index-laporan');
    }

    public function produksi()
    {
        return view('admin.pages.laporan.produksi-laporan');
    }

    public function stok()
    {
        return view('admin.pages.laporan.stok-laporan');
    }

    public function penjualan()
    {
        return view('admin.pages.laporan.penjualan-laporan');
    }

    public function exportPdf($type)
    {
        // TODO: Implement PDF export
        // return response()->download($filePath);
        return back()->with('info', 'PDF export belum diimplementasi.');
    }

    public function exportExcel($type)
    {
        // TODO: Implement Excel export
        // return response()->download($filePath);
        return back()->with('info', 'Excel export belum diimplementasi.');
    }
}
