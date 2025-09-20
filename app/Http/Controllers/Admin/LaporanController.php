<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produksi;
use App\Models\BatchProduksi;
use App\Models\StokProduk;
use App\Models\StokBahanBaku;
use App\Models\ProduksiBahan;
use Carbon\Carbon;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.pages.laporan.index-laporan');
    }

    public function produksi(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));

        // Production Summary
        $productions = Produksi::with(['produk', 'batchProduksi.tungku', 'user'])
            ->whereBetween('tanggal_produksi', [$startDate, $endDate])
            ->orderBy('tanggal_produksi', 'desc')
            ->get();

        // Production Statistics
        $stats = [
            'total_productions' => $productions->count(),
            'completed_productions' => $productions->where('status', 'selesai')->count(),
            'total_target' => $productions->sum('jumlah_target'),
            'total_hasil' => $productions->sum('jumlah_hasil'),
            'total_cost' => $productions->sum('biaya_produksi'),
            'efficiency' => $productions->sum('jumlah_target') > 0 ?
                ($productions->sum('jumlah_hasil') / $productions->sum('jumlah_target')) * 100 : 0,
        ];

        // Grade Distribution
        $gradeStats = $productions->where('status', 'selesai')
            ->groupBy('grade_kualitas')
            ->map(function($group) {
                return [
                    'count' => $group->count(),
                    'total_quantity' => $group->sum('jumlah_hasil'),
                    'total_cost' => $group->sum('biaya_produksi'),
                ];
            });

        // Batch Performance
        $batchPerformance = BatchProduksi::with(['produksis', 'tungku'])
            ->whereHas('produksis', function($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal_produksi', [$startDate, $endDate]);
            })
            ->get()
            ->map(function($batch) {
                $productions = $batch->produksis;
                return [
                    'batch' => $batch,
                    'total_productions' => $productions->count(),
                    'total_cost' => $productions->sum('biaya_produksi'),
                    'total_output' => $productions->sum('jumlah_hasil'),
                    'efficiency' => $productions->sum('jumlah_target') > 0 ?
                        ($productions->sum('jumlah_hasil') / $productions->sum('jumlah_target')) * 100 : 0,
                ];
            });

        return view('admin.pages.laporan.produksi-laporan', compact(
            'productions', 'stats', 'gradeStats', 'batchPerformance', 'startDate', 'endDate'
        ));
    }

    public function stok(Request $request)
    {
        $type = $request->get('type', 'produk'); // produk or bahan_baku

        if ($type === 'produk') {
            // Product Stock Report
            $stocks = StokProduk::with(['produk', 'batchProduksi'])
                ->where('sisa_stok', '>', 0)
                ->orderBy('produk_id')
                ->orderBy('tanggal')
                ->get();

            // Group by product
            $productSummary = $stocks->groupBy('produk_id')->map(function($group) {
                $product = $group->first()->produk;
                return [
                    'produk' => $product,
                    'total_stok' => $group->sum('sisa_stok'),
                    'total_nilai' => $group->sum(function($item) {
                        return $item->sisa_stok * $item->harga_satuan;
                    }),
                    'batches' => $group->count(),
                    'grade_distribution' => $group->groupBy('grade_kualitas')->map->count(),
                ];
            });

            return view('admin.pages.laporan.stok-laporan', compact('stocks', 'productSummary', 'type'));
        } else {
            // Raw Material Stock Report
            $stocks = StokBahanBaku::with(['bahanBaku'])
                ->where('sisa_stok', '>', 0)
                ->orderBy('bahan_baku_id')
                ->orderBy('tanggal', 'asc')
                ->get();

            // Group by material
            $materialSummary = $stocks->groupBy('bahan_baku_id')->map(function($group) {
                $material = $group->first()->bahanBaku;
                return [
                    'bahan_baku' => $material,
                    'total_stok' => $group->sum('sisa_stok'),
                    'total_nilai' => $group->sum(function($item) {
                        return $item->sisa_stok * $item->harga_satuan;
                    }),
                    'batches' => $group->count(),
                    'oldest_batch' => $group->min('tanggal'),
                    'newest_batch' => $group->max('tanggal'),
                ];
            });

            return view('admin.pages.laporan.stok-laporan', compact('stocks', 'materialSummary', 'type'));
        }
    }

    public function costAnalysis(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->get('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));

        // Cost Analysis by Product
        $costByProduct = Produksi::with('produk')
            ->whereBetween('tanggal_produksi', [$startDate, $endDate])
            ->where('status', 'selesai')
            ->selectRaw('produk_id, SUM(biaya_produksi) as total_cost, SUM(jumlah_hasil) as total_output')
            ->groupBy('produk_id')
            ->get()
            ->map(function($item) {
                return [
                    'produk' => $item->produk,
                    'total_cost' => $item->total_cost,
                    'total_output' => $item->total_output,
                    'avg_cost_per_unit' => $item->total_output > 0 ? $item->total_cost / $item->total_output : 0,
                ];
            });

        // Cost Analysis by Batch
        $costByBatch = BatchProduksi::with(['produksis', 'tungku'])
            ->whereHas('produksis', function($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal_produksi', [$startDate, $endDate])
                      ->where('status', 'selesai');
            })
            ->get()
            ->map(function($batch) {
                $productions = $batch->produksis->where('status', 'selesai');
                $totalCost = $productions->sum('biaya_produksi');
                $totalOutput = $productions->sum('jumlah_hasil');

                return [
                    'batch' => $batch,
                    'total_productions' => $productions->count(),
                    'total_cost' => $totalCost,
                    'total_output' => $totalOutput,
                    'avg_cost_per_unit' => $totalOutput > 0 ? $totalCost / $totalOutput : 0,
                    'cost_breakdown' => $this->getCostBreakdown($batch),
                ];
            });

        // Material Cost Trends
        $materialCostTrend = ProduksiBahan::with(['produksi', 'bahanBaku'])
            ->whereHas('produksi', function($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal_produksi', [$startDate, $endDate])
                      ->where('status', 'selesai');
            })
            ->selectRaw('bahan_baku_id, AVG(harga_satuan) as avg_price, SUM(total_biaya) as total_cost')
            ->groupBy('bahan_baku_id')
            ->get()
            ->map(function($item) {
                return [
                    'bahan_baku' => $item->bahanBaku,
                    'avg_price' => $item->avg_price,
                    'total_cost' => $item->total_cost,
                ];
            });

        return view('admin.pages.laporan.cost-analysis', compact(
            'costByProduct', 'costByBatch', 'materialCostTrend', 'startDate', 'endDate'
        ));
    }

    private function getCostBreakdown(BatchProduksi $batch)
    {
        $productions = $batch->produksis->where('status', 'selesai');

        $materialCost = 0;
        $operationalCost = $batch->total_biaya_operasional ?? 0;

        foreach ($productions as $production) {
            $materialCost += $production->produksiBahans->sum('total_biaya');
        }

        return [
            'material' => $materialCost,
            'operational' => $operationalCost,
            'total' => $materialCost + $operationalCost,
        ];
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
