<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\MasterBahanBaku;
use Illuminate\Support\Facades\Log;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $viewPath = $isMaster ? 'admin.pages.master-bahan.index-master-bahan' : 'admin.pages.bahanbaku.index-bahanbaku';

        if ($isMaster) {
            // Untuk master bahan, gunakan MasterBahanBaku model
            $query = MasterBahanBaku::query();
        } else {
            // Untuk operasional, gunakan BahanBaku model
            $query = BahanBaku::query();
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

        if (!$isMaster) {
            // Untuk operasional, load master bahan untuk dropdown
            $masterBahans = MasterBahanBaku::aktif()->get();
            return view($viewPath, compact('masterBahans'));
        }

        return view($viewPath);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $routeName = $isMaster ? 'backoffice.master-bahan.index' : 'backoffice.bahanbaku.index';

        if ($isMaster) {
            // Validation untuk master bahan
            $request->validate([
                'kode_bahan' => 'required|string|max:50|unique:master_bahan_baku,kode_bahan',
                'nama_bahan' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
                'harga_per_satuan' => 'required|numeric|min:0',
                'deskripsi' => 'nullable|string',
                'status' => 'nullable|string|in:aktif,nonaktif'
            ]);

            MasterBahanBaku::create([
                'kode_bahan' => $request->kode_bahan,
                'nama_bahan' => $request->nama_bahan,
                'satuan' => $request->satuan,
                'harga_per_satuan' => $request->harga_per_satuan,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status ?? 'aktif'
            ]);

            return redirect()->route($routeName)->with('success', 'Master bahan baku berhasil dibuat.');
        } else {
            // Validation untuk operasional bahan
            $request->validate([
                'master_bahan_id' => 'required|exists:master_bahan_baku,id',
                'kode_bahan' => 'required|string|max:50|unique:bahan_baku,kode_bahan',
                'nama_bahan' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
                'harga_per_satuan' => 'required|numeric|min:0',
                'stok' => 'required|numeric|min:0',
                'tanggal_masuk' => 'required|date',
                'tanggal_kadaluarsa' => 'nullable|date',
                'status' => 'nullable|string|in:aktif,nonaktif'
            ]);

            BahanBaku::create([
                'master_bahan_id' => $request->master_bahan_id,
                'kode_bahan' => $request->kode_bahan,
                'nama_bahan' => $request->nama_bahan,
                'satuan' => $request->satuan,
                'harga_per_satuan' => $request->harga_per_satuan,
                'stok' => $request->stok,
                'tanggal_masuk' => $request->tanggal_masuk,
                'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
                'status' => $request->status ?? 'aktif'
            ]);

            return redirect()->route($routeName)->with('success', 'Bahan baku berhasil dibuat.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $viewPath = $isMaster ? 'admin.pages.master-bahan.show-master-bahan' : 'admin.pages.bahanbaku.show-bahanbaku';

        if ($isMaster) {
            $bahanBaku = MasterBahanBaku::findOrFail($id);
        } else {
            $bahanBaku = BahanBaku::findOrFail($id);
        }

        return view($viewPath, compact('bahanBaku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $viewPath = $isMaster ? 'admin.pages.master-bahan.edit-master-bahan' : 'admin.pages.bahanbaku.edit-bahanbaku';

        if ($isMaster) {
            $bahanBaku = MasterBahanBaku::findOrFail($id);
        } else {
            $bahanBaku = BahanBaku::findOrFail($id);
            // Load master bahan untuk dropdown
            $masterBahans = MasterBahanBaku::aktif()->get();
            return view($viewPath, compact('bahanBaku', 'masterBahans'));
        }

        return view($viewPath, compact('bahanBaku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $routeName = $isMaster ? 'backoffice.master-bahan.index' : 'backoffice.bahanbaku.index';

        if ($isMaster) {
            // Validation untuk master bahan
            $request->validate([
                'kode_bahan' => 'required|string|max:50|unique:master_bahan_baku,kode_bahan,' . $id,
                'nama_bahan' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
                'harga_per_satuan' => 'required|numeric|min:0',
                'deskripsi' => 'nullable|string',
                'status' => 'nullable|string|in:aktif,nonaktif'
            ]);

            $bahanBaku = MasterBahanBaku::findOrFail($id);

            $bahanBaku->update([
                'kode_bahan' => $request->kode_bahan,
                'nama_bahan' => $request->nama_bahan,
                'satuan' => $request->satuan,
                'harga_per_satuan' => $request->harga_per_satuan,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status ?? 'aktif'
            ]);

            return redirect()->route($routeName)->with('success', 'Master bahan baku berhasil diperbarui.');
        } else {
            // Validation untuk operasional bahan
            $request->validate([
                'master_bahan_id' => 'required|exists:master_bahan_baku,id',
                'kode_bahan' => 'required|string|max:50|unique:bahan_baku,kode_bahan,' . $id,
                'nama_bahan' => 'required|string|max:255',
                'satuan' => 'required|string|max:50',
                'harga_per_satuan' => 'required|numeric|min:0',
                'stok' => 'required|numeric|min:0',
                'tanggal_masuk' => 'required|date',
                'tanggal_kadaluarsa' => 'nullable|date',
                'status' => 'nullable|string|in:aktif,nonaktif'
            ]);

            $bahanBaku = BahanBaku::findOrFail($id);

            $bahanBaku->update([
                'master_bahan_id' => $request->master_bahan_id,
                'kode_bahan' => $request->kode_bahan,
                'nama_bahan' => $request->nama_bahan,
                'satuan' => $request->satuan,
                'harga_per_satuan' => $request->harga_per_satuan,
                'stok' => $request->stok,
                'tanggal_masuk' => $request->tanggal_masuk,
                'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
                'status' => $request->status ?? 'aktif'
            ]);

            return redirect()->route($routeName)->with('success', 'Bahan baku berhasil diperbarui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $isMaster = request()->routeIs('backoffice.master-bahan.*');
        $routeName = $isMaster ? 'backoffice.master-bahan.index' : 'backoffice.bahanbaku.index';

        if ($isMaster) {
            $bahanBaku = MasterBahanBaku::findOrFail($id);
            $bahanBaku->delete();
            $message = 'Master bahan baku berhasil dihapus.';
        } else {
            $bahanBaku = BahanBaku::findOrFail($id);
            $bahanBaku->delete();
            $message = 'Bahan baku berhasil dihapus.';
        }

        return redirect()->route($routeName)->with('success', $message);
    }
}
