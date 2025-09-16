<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produksi;
use App\Models\Produk;
use App\Models\BahanBaku;
use App\Models\ProduksiBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produksi = Produksi::with(['produk', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

    return view('admin.pages.produksi.index-produksi', compact('produksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::where('status', true)->get();
        $bahanBakus = BahanBaku::where('status', true)->get();
        
    return view('admin.pages.produksi.create-produksi', compact('produks', 'bahanBakus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'tanggal_produksi' => 'required|date',
            'jumlah_target' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
            'bahan_baku' => 'required|array',
            'bahan_baku.*.id' => 'required|exists:bahan_bakus,id',
            'bahan_baku.*.jumlah' => 'required|numeric|min:0.001',
        ]);

        DB::transaction(function() use ($request) {
            // Generate nomor produksi
            $nomorProduksi = 'PRD-' . date('Ymd') . '-' . str_pad(Produksi::whereDate('created_at', today())->count() + 1, 3, '0', STR_PAD_LEFT);

            // Create produksi record
            $produksi = Produksi::create([
                'nomor_produksi' => $nomorProduksi,
                'produk_id' => $request->produk_id,
                'tanggal_produksi' => $request->tanggal_produksi,
                'jumlah_target' => $request->jumlah_target,
                'catatan' => $request->catatan,
                'user_id' => auth()->id(),
            ]);

            // Calculate total cost and save bahan usage
            $totalCost = 0;
            foreach ($request->bahan_baku as $bahan) {
                $bahanBaku = BahanBaku::find($bahan['id']);
                $biayaBahan = $bahanBaku->harga_beli_terakhir * $bahan['jumlah'];
                $totalCost += $biayaBahan;

                // Save bahan usage
                ProduksiBahan::create([
                    'produksi_id' => $produksi->id,
                    'bahan_baku_id' => $bahan['id'],
                    'jumlah_digunakan' => $bahan['jumlah'],
                    'biaya_bahan' => $biayaBahan,
                ]);

                // Update stok bahan baku
                $bahanBaku->decrement('stok', $bahan['jumlah']);
            }

            // Update biaya produksi
            $produksi->update(['biaya_produksi' => $totalCost]);
        });

    return redirect()->route('backoffice.produksi.index')->with('success', 'Rencana produksi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produksi $produksi)
    {
        $produksi->load(['produk', 'user', 'produksiBahans.bahanBaku']);
        
    return view('admin.pages.produksi.show-produksi', compact('produksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produksi $produksi)
    {
        $produksi->load(['produksiBahans.bahanBaku']);
        $produks = Produk::where('status', true)->get();
        $bahanBakus = BahanBaku::where('status', true)->get();
        
    return view('admin.pages.produksi.edit-produksi', compact('produksi', 'produks', 'bahanBakus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produksi $produksi)
    {
        $request->validate([
            'status' => 'required|in:rencana,proses,selesai,gagal',
            'jumlah_hasil' => 'required_if:status,selesai|integer|min:0',
            'catatan' => 'nullable|string',
        ]);

        DB::transaction(function() use ($request, $produksi) {
            $produksi->update([
                'status' => $request->status,
                'jumlah_hasil' => $request->jumlah_hasil ?? 0,
                'catatan' => $request->catatan,
            ]);

            // If production is completed, update product stock
            if ($request->status === 'selesai' && $request->jumlah_hasil > 0) {
                $produksi->produk->increment('stok', $request->jumlah_hasil);
            }
        });

    return redirect()->route('backoffice.produksi.index')->with('success', 'Status produksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produksi $produksi)
    {
        DB::transaction(function() use ($produksi) {
            // Restore bahan baku stock if production is cancelled
            if ($produksi->status !== 'selesai') {
                foreach ($produksi->produksiBahans as $produksiBahan) {
                    $produksiBahan->bahanBaku->increment('stok', $produksiBahan->jumlah_digunakan);
                }
            }

            $produksi->delete();
        });

    return redirect()->route('backoffice.produksi.index')->with('success', 'Data produksi berhasil dihapus.');
    }
}
