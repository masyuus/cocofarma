@extends('layouts.admin')

@section('content')
    <!-- App Content Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Cocofarma</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <!-- App Content -->
    <div class="app-content">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row">
                <!-- Col -->
                <div class="col-lg-3 col-6">
                    <!-- Small Box Widget 1 -->
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Pesanan Baru</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"></path>
                        </svg>
                        <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <!-- Small Box Widget 2 -->
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>Rp 11M</h3>
                            <p>Pendapatan</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z"></path>
                        </svg>
                        <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <!-- Small Box Widget 3 -->
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>5 Ton</h3>
                            <p>Stok Produk</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z"></path>
                            <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="#" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <!-- Small Box Widget 4 -->
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3>10 Ton</h3>
                            <p>Stok Bahan Baku</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H13.5a5.25 5.25 0 0 0 5.262-5.55 6 6 0 0 0-8.262-5.95z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Laporan Penjualan</h3>
                            <div class="card-tools">
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="periodFilter" id="daily" value="daily" autocomplete="off">
                                    <label class="btn btn-outline-primary btn-sm" for="daily">Harian</label>
                                    
                                    <input type="radio" class="btn-check" name="periodFilter" id="weekly" value="weekly" autocomplete="off">
                                    <label class="btn btn-outline-primary btn-sm" for="weekly">Mingguan</label>
                                    
                                    <input type="radio" class="btn-check" name="periodFilter" id="monthly" value="monthly" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary btn-sm" for="monthly">Bulanan</label>
                                    
                                    <input type="radio" class="btn-check" name="periodFilter" id="yearly" value="yearly" autocomplete="off">
                                    <label class="btn btn-outline-primary btn-sm" for="yearly">Tahunan</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="salesChart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Goal Completion</h3>
                        </div>
                        <div class="card-body">
                            <!-- Goal Progress Items -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="text-sm">Pesanan Produk Arang</span>
                                    <span class="text-sm font-weight-bold">160/200</span>
                                </div>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="text-sm">Pesanan Selesai</span>
                                    <span class="text-sm font-weight-bold">310/400</span>
                                </div>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 77.5%" aria-valuenow="77.5" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="text-sm">Kunjungan Website</span>
                                    <span class="text-sm font-weight-bold">480/800</span>
                                </div>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="text-sm">Inquiry Pelanggan</span>
                                    <span class="text-sm font-weight-bold">250/500</span>
                                </div>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            
                            <!-- Revenue Section -->
                            <div class="row text-center">
                                <div class="col-6 mb-3">
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <i class="bi bi-arrow-up text-success me-1"></i>
                                        <small class="text-success">17%</small>
                                    </div>
                                    <h5 class="mb-0">Rp 35,210,430</h5>
                                    <small class="text-muted">TOTAL REVENUE</small>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <i class="bi bi-dash text-warning me-1"></i>
                                        <small class="text-warning">0%</small>
                                    </div>
                                    <h5 class="mb-0">Rp 10,390,900</h5>
                                    <small class="text-muted">TOTAL COST</small>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <i class="bi bi-arrow-up text-success me-1"></i>
                                        <small class="text-success">20%</small>
                                    </div>
                                    <h5 class="mb-0">Rp 24,813,530</h5>
                                    <small class="text-muted">TOTAL PROFIT</small>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <i class="bi bi-arrow-up text-success me-1"></i>
                                        <small class="text-success">18%</small>
                                    </div>
                                    <h5 class="mb-0">1,200</h5>
                                    <small class="text-muted">GOAL COMPLETIONS</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                     <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Transaksi Penjualan Terkini</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-download"></i> Export
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID Pesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Produk</th>
                                            <th>Status</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#" class="text-primary">#OR9842</a></td>
                                            <td>PT Total Carbon</td>
                                            <td>Arang Kelapa</td>
                                            <td><span class="badge text-bg-success">Selesai</span></td>
                                            <td>2 Ton</td>
                                            <td class="text-success fw-bold">Rp 8,500,000</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-primary">#OR1848</a></td>
                                            <td>Toko Maju Jaya</td>
                                            <td>Produk Hexa</td>
                                            <td><span class="badge text-bg-warning">Pending</span></td>
                                            <td>50 kg</td>
                                            <td class="text-warning fw-bold">Rp 750,000</td>
                                        </tr>
                                         <tr>
                                            <td><a href="#" class="text-primary">#OR7429</a></td>
                                            <td>PT Briket Sejahtera</td>
                                            <td>Arang Kelapa</td>
                                            <td><span class="badge text-bg-info">Diproses</span></td>
                                            <td>1.5 Ton</td>
                                            <td class="text-info fw-bold">Rp 6,375,000</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-primary">#OR3621</a></td>
                                            <td>CV Karbon Mandiri</td>
                                            <td>Produk Hexa</td>
                                            <td><span class="badge text-bg-success">Selesai</span></td>
                                            <td>75 kg</td>
                                            <td class="text-success fw-bold">Rp 1,125,000</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="text-primary">#OR5847</a></td>
                                            <td>PT Energi Hijau</td>
                                            <td>Arang Kelapa</td>
                                            <td><span class="badge text-bg-danger">Dibatalkan</span></td>
                                            <td>3 Ton</td>
                                            <td class="text-danger fw-bold">Rp 12,750,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Performance Analytics</h3>
                        </div>
                        <div class="card-body">
                            <div id="performanceChart" style="height: 200px;"></div>
                            
                            <!-- Top Products -->
                            <div class="mt-4">
                                <h6 class="text-muted mb-3">Top Performing Products</h6>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                        <span class="text-sm">Arang Kelapa</span>
                                    </div>
                                    <span class="text-sm fw-bold">68%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                        <span class="text-sm">Produk Hexa</span>
                                    </div>
                                    <span class="text-sm fw-bold">32%</span>
                                </div>
                            </div>
                            
                            <!-- Customer Satisfaction -->
                            <div class="mt-4">
                                <h6 class="text-muted mb-3">Customer Satisfaction</h6>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-sm">Sangat Puas</span>
                                    <span class="text-sm fw-bold text-success">45%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-sm">Puas</span>
                                    <span class="text-sm fw-bold text-primary">38%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-sm">Netral</span>
                                    <span class="text-sm fw-bold text-warning">12%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-sm">Tidak Puas</span>
                                    <span class="text-sm fw-bold text-danger">5%</span>
                                </div>
                            </div>
                        </div>
                    </div>
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
            // Data untuk berbagai periode
            const salesData = {
                daily: {
                    categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    arangKelapa: [2.5, 3.2, 2.8, 4.1, 3.7, 5.2, 4.8],
                    produkHexa: [15, 22, 18, 28, 25, 35, 32]
                },
                weekly: {
                    categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                    arangKelapa: [18, 22, 25, 28],
                    produkHexa: [120, 150, 180, 200]
                },
                monthly: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    arangKelapa: [20, 25, 22, 30, 28, 35, 32, 40, 38, 42, 45, 48],
                    produkHexa: [150, 200, 180, 220, 250, 230, 270, 280, 290, 310, 320, 340]
                },
                yearly: {
                    categories: ['2020', '2021', '2022', '2023', '2024'],
                    arangKelapa: [280, 320, 380, 420, 450],
                    produkHexa: [2200, 2800, 3200, 3600, 3800]
                }
            };

            // Inisialisasi chart penjualan
            let salesChart;
            
            function initSalesChart(period = 'monthly') {
                const data = salesData[period];
                
                const salesChartOptions = {
                    chart: { 
                        type: 'area', 
                        height: 350,
                        toolbar: {
                            show: true,
                            tools: {
                                download: true,
                                selection: true,
                                zoom: true,
                                zoomin: true,
                                zoomout: true,
                                pan: true,
                                reset: true
                            }
                        },
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 800
                        }
                    },
                    series: [
                        { 
                            name: 'Arang Kelapa (ton)', 
                            data: data.arangKelapa,
                            color: '#0d6efd'
                        },
                        { 
                            name: 'Produk Hexa (kg)', 
                            data: data.produkHexa,
                            color: '#20c997'
                        }
                    ],
                    xaxis: { 
                        categories: data.categories,
                        labels: {
                            style: {
                                fontSize: '12px'
                            }
                        }
                    },
                    yaxis: [
                        {
                            title: {
                                text: 'Arang Kelapa (ton)',
                                style: {
                                    color: '#0d6efd'
                                }
                            },
                            labels: {
                                style: {
                                    colors: '#0d6efd'
                                }
                            }
                        },
                        {
                            opposite: true,
                            title: {
                                text: 'Produk Hexa (kg)',
                                style: {
                                    color: '#20c997'
                                }
                            },
                            labels: {
                                style: {
                                    colors: '#20c997'
                                }
                            }
                        }
                    ],
                    dataLabels: { 
                        enabled: false 
                    },
                    stroke: { 
                        curve: 'smooth',
                        width: 2
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                            opacityTo: 0.3,
                            stops: [0, 90, 100]
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'left'
                    },
                    grid: {
                        borderColor: '#e7e7e7',
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        }
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        y: {
                            formatter: function (val, opts) {
                                if (opts.seriesIndex === 0) {
                                    return val + " ton";
                                } else {
                                    return val + " kg";
                                }
                            }
                        }
                    }
                };
                
                if (salesChart) {
                    salesChart.destroy();
                }
                
                salesChart = new ApexCharts(document.querySelector("#salesChart"), salesChartOptions);
                salesChart.render();
            }

            // Event listener untuk filter periode
            document.querySelectorAll('input[name="periodFilter"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        initSalesChart(this.value);
                    }
                });
            });

            // Inisialisasi chart dengan periode bulanan
            initSalesChart('monthly');

            // --- Chart 2: Goal Completion (Radial Bar) ---
            var goalCompletionOptions = {
                chart: {
                    type: 'radialBar',
                    height: 300,
                    sparkline: {
                        enabled: false
                    }
                },
                series: [75, 88, 92],
                colors: ['#0d6efd', '#198754', '#17a2b8'],
                plotOptions: {
                    radialBar: {
                        startAngle: -90,
                        endAngle: 90,
                        track: {
                            background: "#e7e7e7",
                            strokeWidth: '97%',
                            margin: 5,
                            dropShadow: {
                                enabled: true,
                                top: 2,
                                left: 0,
                                color: '#999',
                                opacity: 1,
                                blur: 2
                            }
                        },
                        dataLabels: {
                            name: {
                                show: false
                            },
                            value: {
                                offsetY: -2,
                                fontSize: '22px'
                            }
                        }
                    }
                },
                grid: {
                    padding: {
                        top: -10
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        shadeIntensity: 0.4,
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 50, 53, 91]
                    }
                },
                labels: ['Penjualan', 'Produksi', 'Kepuasan'],
                legend: {
                    show: true,
                    position: 'bottom',
                    offsetY: 0,
                    height: 30
                }
            };

            var goalChart = new ApexCharts(document.querySelector("#goalCompletionChart"), goalCompletionOptions);
            goalChart.render();

            // --- Chart 3: Performance Analytics (Donut Chart) ---
            var performanceOptions = {
                chart: {
                    type: 'donut',
                    height: 200,
                    sparkline: {
                        enabled: false
                    }
                },
                series: [68, 32],
                colors: ['#0d6efd', '#198754'],
                labels: ['Arang Kelapa', 'Produk Hexa'],
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total',
                                    formatter: function () {
                                        return '100%'
                                    }
                                }
                            }
                        }
                    }
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return Math.round(val) + '%'
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + '%'
                        }
                    }
                }
            };

            var performanceChart = new ApexCharts(document.querySelector("#performanceChart"), performanceOptions);
            performanceChart.render();
        });
    </script>
@endsection