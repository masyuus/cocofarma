<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BahanBaku;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $viewPath = $isMaster ? 'admin.pages.master-bahan.index-master-bahan' : 'admin.pages.bahanbaku.index-bahanbaku';
        
        $query = BahanBaku::query();
        
        if ($isMaster) {
            // Untuk master bahan, tampilkan bahan baku dengan kategori 'Master' atau kosong
            $query->where(function($q) {
                $q->where('kategori', 'Master')
                  ->orWhereNull('kategori');
            });
        } else {
            // Untuk operasional, tampilkan bahan baku dengan kategori 'Operational' atau kosong
            $query->where(function($q) {
                $q->where('kategori', 'Operational')
                  ->orWhereNull('kategori');
            });
        }
        
        $perPage = request('per_page', 5); // Default 5, bisa diubah via parameter
        $bahanBakus = $query->paginate($perPage)->appends(request()->query());
        
        return view($viewPath, compact('bahanBakus'));
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
        $request->validate([
            'kode_bahan' => 'required|string|max:255|unique:bahan_bakus,kode_bahan',
            'nama_bahan' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'satuan' => 'required|string|max:50',
            'stok' => 'nullable|integer|min:0',
            'minimum_stok' => 'nullable|numeric|min:0',
            'harga_beli_terakhir' => 'nullable|numeric|min:0',
            'supplier' => 'nullable|string|max:255',
            'tanggal_kadaluarsa' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);

        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $routeName = $isMaster ? 'backoffice.master-bahan.index' : 'backoffice.bahanbaku.index';

        // Set default kategori jika tidak diset
        $kategori = $request->kategori;
        if (!$kategori) {
            $kategori = $isMaster ? 'Master' : 'Oprasional';
        }

        BahanBaku::create([
            'kode_bahan' => $request->kode_bahan,
            'nama_bahan' => $request->nama_bahan,
            'kategori' => $kategori,
            'deskripsi' => $request->deskripsi,
            'satuan' => $request->satuan,
            'stok' => $request->stok ?? 0,
            'minimum_stok' => $request->minimum_stok ?? 0,
            'harga_beli_terakhir' => $request->harga_beli_terakhir,
            'supplier' => $request->supplier,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'status' => $request->status ?? true
        ]);

        return redirect()->route($routeName)->with('success', 'Bahan baku berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $viewPath = $isMaster ? 'admin.pages.master-bahan.show-master-bahan' : 'admin.pages.bahanbaku.show-bahanbaku';
        
        $bahanBaku = BahanBaku::findOrFail($id);
        
        return view($viewPath, compact('bahanBaku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $viewPath = $isMaster ? 'admin.pages.master-bahan.edit-master-bahan' : 'admin.pages.bahanbaku.edit-bahanbaku';
        
        $bahanBaku = BahanBaku::findOrFail($id);
        
        return view($viewPath, compact('bahanBaku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_bahan' => 'required|string|max:255|unique:bahan_bakus,kode_bahan,' . $id,
            'nama_bahan' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'satuan' => 'required|string|max:50',
            'stok' => 'nullable|integer|min:0',
            'minimum_stok' => 'nullable|numeric|min:0',
            'harga_beli_terakhir' => 'nullable|numeric|min:0',
            'supplier' => 'nullable|string|max:255',
            'tanggal_kadaluarsa' => 'nullable|date',
            'status' => 'nullable|boolean'
        ]);

        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $routeName = $isMaster ? 'backoffice.master-bahan.index' : 'backoffice.bahanbaku.index';

        $bahanBaku = BahanBaku::findOrFail($id);

        $bahanBaku->update([
            'kode_bahan' => $request->kode_bahan,
            'nama_bahan' => $request->nama_bahan,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'satuan' => $request->satuan,
            'stok' => $request->stok ?? 0,
            'minimum_stok' => $request->minimum_stok ?? 0,
            'harga_beli_terakhir' => $request->harga_beli_terakhir,
            'supplier' => $request->supplier,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'status' => $request->status ?? true
        ]);

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
