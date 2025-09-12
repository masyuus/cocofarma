@extends('layouts.admin')

@section('content')
    <div class="page-header d-print-none mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Dashboard Analitik</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Cocofarma</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="bg-primary text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg></span></div>
                        <div class="col">
                            <div class="font-weight-medium">150 Pesanan Baru</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="bg-green text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg></span></div>
                        <div class="col">
                            <div class="font-weight-medium">Rp 11.000.000</div>
                            <div class="text-muted">Pendapatan Hari Ini</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="bg-warning text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M7 12a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /></svg></span></div>
                        <div class="col">
                            <div class="font-weight-medium">5 Ton</div>
                            <div class="text-muted">Stok Produk Jadi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="bg-danger text-white avatar"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l5 -5" /><path d="M7 6l5 5l5 -5" /></svg></span></div>
                        <div class="col">
                            <div class="font-weight-medium">10 Ton</div>
                            <div class="text-muted">Stok Bahan Baku</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cards mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Grafik Performa Produksi</h3>
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm" data-filter="daily">Harian</a>
                            <a href="#" class="btn btn-sm active" data-filter="weekly">Mingguan</a>
                            <a href="#" class="btn btn-sm" data-filter="monthly">Bulanan</a>
                            <a href="#" class="btn btn-sm" data-filter="yearly">Tahunan</a>
                        </div>
                    </div>
                    <div id="mainProductionChart"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cards mt-3">
        <div class="col-lg-7">
            <div class="card">
                 <div class="card-header">
                    <h3 class="card-title">Analisis Lainnya</h3>
                    <div class="card-actions">
                        <select id="chartTypeSelector" class="form-select form-select-sm">
                            <option value="donut">Komposisi Produk</option>
                            <option value="radialBar">Level Stok</option>
                            <option value="bar">Perbandingan Produk</option>
                        </select>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 280px;">
                    <div id="secondaryChartContainer" style="width: 100%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card" style="height: 100%">
                <div class="card-header">
                    <h3 class="card-title">Transaksi Terkini</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter">
                        <thead>
                            <tr>
                                <th>Pelanggan</th>
                                <th>Produk</th>
                                <th class="text-end">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PT Total Carbon</td>
                                <td>Arang Kelapa</td>
                                <td class="text-end text-success">2 Ton</td>
                            </tr>
                            <tr>
                                <td>Toko Maju Jaya</td>
                                <td>Produk Hexa</td>
                                <td class="text-end text-success">50 kg</td>
                            </tr>
                            <tr>
                                <td>Pelanggan Retail</td>
                                <td>Produk Hexa</td>
                                <td class="text-end text-success">5 kg</td>
                            </tr>
                             <tr>
                                <td>PT Briket Sejahtera</td>
                                <td>Arang Kelapa</td>
                                <td class="text-end text-success">1.5 Ton</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row row-cards mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Data Produksi Terbaru</h3></div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>ID Produksi</th>
                                <th>Tanggal Mulai</th>
                                <th>Hasil</th>
                                <th>Status</th>
                                <th>Operator</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PROD-005</td>
                                <td>12 Sep 2025</td>
                                <td>2 Ton Arang Kelapa</td>
                                <td><span class="badge bg-success me-1"></span> Selesai</td>
                                <td>Operator</td>
                            </tr>
                            <tr>
                                <td>PROD-004</td>
                                <td>11 Sep 2025</td>
                                <td>100 kg Produk Hexa</td>
                                <td><span class="badge bg-success me-1"></span> Selesai</td>
                                <td>Operator</td>
                            </tr>
                             <tr>
                                <td>PROD-003</td>
                                <td>10 Sep 2025</td>
                                <td>1.8 Ton Arang Kelapa</td>
                                <td><span class="badge bg-success me-1"></span> Selesai</td>
                                <td>Operator</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({ icon: 'success', title: 'Sukses!', text: '{{ session("success") }}', timer: 2000, showConfirmButton: false });
            });
        </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Data Dummy
            const chartData = {
                daily: { categories: ['08:00', '10:00', '12:00', '14:00', '16:00', '18:00'], series: [{ name: 'Produksi (kg)', data: [120, 150, 180, 160, 200, 190] }] },
                weekly: { categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'], series: [{ name: 'Produksi (ton)', data: [2.3, 3.1, 4.0, 5.1, 4.0, 3.6, 3.2] }] },
                monthly: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu'], series: [{ name: 'Produksi (ton)', data: [20, 25, 22, 30, 28, 35, 32, 40] }] },
                yearly: { categories: ['2022', '2023', '2024', '2025'], series: [{ name: 'Produksi (ton)', data: [300, 350, 400, 450] }] }
            };

            // --- Chart 1: Grafik Performa Produksi (Utama) ---
            var mainChart = new ApexCharts(document.querySelector("#mainProductionChart"), {
                chart: { type: 'area', height: 300, zoom: { enabled: false }, toolbar: { show: false } },
                series: chartData.weekly.series,
                xaxis: { categories: chartData.weekly.categories },
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth' }
            });
            mainChart.render();

            // --- Chart Lainnya (dinamis) ---
            const secondaryChartContainer = document.querySelector("#secondaryChartContainer");
            let secondaryChart;

            const chartOptions = {
                donut: {
                    chart: { type: 'donut', height: 280 },
                    series: [65, 35],
                    labels: ['Arang Tempurung', 'Produk Hexa'],
                    legend: { position: 'bottom' }
                },
                radialBar: {
                    chart: { type: 'radialBar', height: 280 },
                    series: [76],
                    plotOptions: { radialBar: { hollow: { size: '70%' }, dataLabels: { name: { fontSize: '18px' }, value: { fontSize: '16px' } } } },
                    labels: ['Ketersediaan Stok'],
                },
                bar: {
                    chart: { type: 'bar', height: 280 },
                    series: [{ name: 'Penjualan', data: [400, 250] }],
                    xaxis: { categories: ['Arang Tempurung', 'Produk Hexa'] }
                }
            };
            
            function renderSecondaryChart(type) {
                if(secondaryChart) secondaryChart.destroy();
                secondaryChart = new ApexCharts(secondaryChartContainer, chartOptions[type]);
                secondaryChart.render();
            }

            renderSecondaryChart('donut'); // Tampilkan chart donut pertama kali

            // --- Logika Filter ---
            document.querySelectorAll('.btn-group .btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.btn-group .btn').forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    const filter = this.getAttribute('data-filter');
                    mainChart.updateOptions({ xaxis: { categories: chartData[filter].categories } });
                    mainChart.updateSeries(chartData[filter].series);
                });
            });
            
            document.querySelector('#chartTypeSelector').addEventListener('change', function() {
                renderSecondaryChart(this.value);
            });
        });
    </script>
@endsection