<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $viewPath = $isMaster ? 'admin.pages.master-bahan.index-master-bahan' : 'admin.pages.bahanbaku.index-bahanbaku';
        return view($viewPath);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $viewPath = $isMaster ? 'admin.pages.master-bahan.create-master-bahan' : 'admin.pages.bahanbaku.create-bahanbaku';
        return view($viewPath);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: Implement store logic
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $routeName = $isMaster ? 'backoffice.master-bahan.index' : 'backoffice.bahanbaku.index';
        return redirect()->route($routeName)->with('success', 'Bahan baku berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $viewPath = $isMaster ? 'admin.pages.master-bahan.show-master-bahan' : 'admin.pages.bahanbaku.show-bahanbaku';
        return view($viewPath, compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $viewPath = $isMaster ? 'admin.pages.master-bahan.edit-master-bahan' : 'admin.pages.bahanbaku.edit-bahanbaku';
        return view($viewPath, compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // TODO: Implement update logic
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $routeName = $isMaster ? 'backoffice.master-bahan.index' : 'backoffice.bahanbaku.index';
        return redirect()->route($routeName)->with('success', 'Bahan baku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // TODO: Implement destroy logic
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $routeName = $isMaster ? 'backoffice.master-bahan.index' : 'backoffice.bahanbaku.index';
        return redirect()->route($routeName)->with('success', 'Bahan baku berhasil dihapus.');
    }
}
