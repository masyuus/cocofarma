@extends('admin.layouts.app')

@php
    $pageTitle = 'Dashboard';
@endphp

@push('styles')
    <!-- Dashboard-specific CSS (moved from global layout) -->
    <link href="{{ asset('bolopa/back/css/admin-dashboard.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- Quick Tiles -->
<div class="row g-3 mb-4">
    @php
        $icons = ['chalkboard-teacher','address-book','user','folder','book','bullhorn'];
        $labels = ['Dosen','Kontak','Staf','Berkas','Perpustakaan','Libur'];
    @endphp
    @for ($i = 0; $i < 6; $i++)
        <div class="col-auto">
            <div class="card quick-tile text-center">
                <div class="position-relative p-2">
                    @if($i==0)
                        <div class="badge bg-dark text-white position-absolute" style="top:-10px;left:6px;border-radius:6px;">5</div>
                    @elseif($i==2)
                        <div class="badge bg-dark text-white position-absolute" style="top:-10px;left:6px;border-radius:6px;">8</div>
                    @endif
                    <i class="fas fa-{{ $icons[$i] }} fa-lg text-secondary"></i>
                </div>
                <div class="mt-2 text-muted small">{{ $labels[$i] }}</div>
            </div>
        </div>
    @endfor
</div>

<!-- Main Charts Row -->
<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="card dashboard-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0">LAPORAN PKM</h6>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-outline-primary active" id="filter-day">1D</button>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="filter-week">1W</button>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="filter-month">1M</button>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="filter-year">1Y</button>
                </div>
            </div>
            <div class="card-body">
                <div id="chart"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card dashboard-card">
            <div class="card-header">
                <h6 class="mb-0">Top Products</h6>
            </div>
            <div class="card-body">
                <div id="topProductsChart"></div>
            </div>
        </div>
    </div>
</div>

<!-- Progress Bars & Summary -->
<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <div class="card dashboard-card">
            <div class="card-header">
                <h6 class="mb-0">Goal Completion</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Penetasan</span>
                        <span class="fw-semibold">75%</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Pembesaran</span>
                        <span class="fw-semibold">60%</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Produksi</span>
                        <span class="fw-semibold">45%</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 45%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card dashboard-card">
            <div class="card-header">
                <h6 class="mb-0">Summary</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="summary-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="summary-label">Total Sales</div>
                                    <div class="summary-value">$12,345</div>
                                </div>
                                <div class="summary-trend trend-up">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>12%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="summary-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="summary-label">New Orders</div>
                                    <div class="summary-value">156</div>
                                </div>
                                <div class="summary-trend trend-up">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>8%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="summary-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="summary-label">Customers</div>
                                    <div class="summary-value">2,345</div>
                                </div>
                                <div class="summary-trend trend-down">
                                    <i class="fas fa-arrow-down"></i>
                                    <span>3%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="summary-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="summary-label">Revenue</div>
                                    <div class="summary-value">$45,678</div>
                                </div>
                                <div class="summary-trend trend-up">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>15%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tables Row -->
<div class="row g-4">
    <div class="col-lg-6">
        <div class="card dashboard-card">
            <div class="card-header">
                <h6 class="mb-0">EXAM TOPPERS</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="table-active">
                                <td><i class="fas fa-trophy text-warning"></i></td>
                                <td>John Doe</td>
                                <td class="text-end"><span class="badge bg-success">95%</span></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-medal text-secondary"></i></td>
                                <td>Jane Smith</td>
                                <td class="text-end"><span class="badge bg-info">92%</span></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-award text-bronze"></i></td>
                                <td>Bob Johnson</td>
                                <td class="text-end"><span class="badge bg-warning">88%</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card dashboard-card">
            <div class="card-header">
                <h6 class="mb-0">NEW STUDENT LIST</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td><div class="avatar-circle">A</div></td>
                                <td>Alice Wilson</td>
                                <td class="text-end"><small class="text-muted">2 hours ago</small></td>
                            </tr>
                            <tr>
                                <td><div class="avatar-circle">M</div></td>
                                <td>Mike Brown</td>
                                <td class="text-end"><small class="text-muted">5 hours ago</small></td>
                            </tr>
                            <tr>
                                <td><div class="avatar-circle">S</div></td>
                                <td>Sarah Davis</td>
                                <td class="text-end"><small class="text-muted">1 day ago</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            </div>
            </div>

                        <!-- Laporan PKM Chart Card -->
            <!-- Displays chart and short description matching the proposal branding -->
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <h6 class="mb-1">LAPORAN PKM</h6>
                            <small class="text-muted">Ringkasan data dan indikator utama untuk proposal PkM Cocofarma. <a href="#">Pelajari</a></small>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-sm btn-light border" title="Collapse"><i class="bi bi-chevron-up"></i></button>
                            <div class="btn-group" role="group" aria-label="Chart Filters">
                                <button type="button" class="btn btn-sm btn-outline-secondary" id="filter-day">1D</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary active" id="filter-week">1W</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" id="filter-month">1M</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" id="filter-year">1Y</button>
                            </div>
                        </div>
                    </div>

                    <div class="chart-wrapper">
                        <div id="chart"></div>
                    </div>

                    <!-- Compact progress summary under chart -->
                    <div class="row text-muted mt-3">
                        <div class="col-md-3">
                            <small>Fees</small>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1 me-2" style="height:6px;">
                                    <div class="progress-bar bg-dark" role="progressbar" style="width:35%"></div>
                                </div>
                                <small>35%</small>
                            </div>
                            <small class="d-block">COMPARED TO LAST YEAR</small>
                        </div>
                        <div class="col-md-3">
                            <small>Donation</small>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1 me-2" style="height:6px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width:61%"></div>
                                </div>
                                <small>61%</small>
                            </div>
                            <small class="d-block">COMPARED TO LAST YEAR</small>
                        </div>
                        <div class="col-md-3">
                            <small>Income</small>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1 me-2" style="height:6px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width:87%"></div>
                                </div>
                                <small>87%</small>
                            </div>
                            <small class="d-block">COMPARED TO LAST YEAR</small>
                        </div>
                        <div class="col-md-3">
                            <small>Expense</small>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1 me-2" style="height:6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width:42%"></div>
                                </div>
                                <small>42%</small>
                            </div>
                            <small class="d-block">COMPARED TO LAST YEAR</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exam Toppers and Performance Radar -->
            <div class="row mb-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0">EXAM TOPPERS</h6>
                                <div>
                                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless align-middle mb-0">
                                    <thead>
                                        <tr class="small text-muted">
                                            <th>NO.</th>
                                            <th>NAME</th>
                                            <th>MARKS</th>
                                            <th>%AGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>11</td>
                                            <td>Merri Diamond<br><small class="text-muted">Science</small></td>
                                            <td>199</td>
                                            <td>99.00</td>
                                        </tr>
                                        <tr class="table-active">
                                            <td>23</td>
                                            <td>Sara Hopkins<br><small class="text-muted">Mechanical</small></td>
                                            <td>197</td>
                                            <td>98.00</td>
                                        </tr>
                                        <tr>
                                            <td>41</td>
                                            <td>Allen Collins<br><small class="text-muted">M.C.A</small></td>
                                            <td>197</td>
                                            <td>98.00</td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>Erin Gonzales<br><small class="text-muted">Arts</small></td>
                                            <td>194</td>
                                            <td>97.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="mb-2">PERFORMANCE</h6>
                            <div class="chart-wrapper">
                                <div id="radarChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New Student List (smaller) -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="mb-3">NEW STUDENT LIST</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover mb-0">
                            <thead class="small text-muted">
                                <tr>
                                    <th>NO</th>
                                    <th>NAME</th>
                                    <th>ASSIGNED PROFESSOR</th>
                                    <th>DATE OF ADMIT</th>
                                    <th>FEES</th>
                                    <th>BRANCH</th>
                                    <th>EDIT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jens Brincker</td>
                                    <td>Kenny Josh</td>
                                    <td>27/05/2016</td>
                                    <td><span class="badge bg-success">paid</span></td>
                                    <td>Mechanical</td>
                                    <td>✔️</td>
                                </tr>
                                <tr class="table-active">
                                    <td>2</td>
                                    <td>Mark Hay</td>
                                    <td>Mark</td>
                                    <td>26/05/2018</td>
                                    <td><span class="badge bg-danger">unpaid</span></td>
                                    <td>Science</td>
                                    <td>✔️</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="row text-center align-items-center">
                <div class="col-md-3">
                    <div class="summary-percent mb-1">
                        <span class="trend-icon trend-up"><i class="fas fa-arrow-up"></i></span>
                        <span class="percent-value">17%</span>
                    </div>
                    <h4 class="fw-bold text-primary">$35,210.43</h4>
                    <p class="text-muted">TOTAL REVENUE</p>
                </div>
                <div class="col-md-3">
                    <div class="summary-percent mb-1">
                        <span class="trend-icon trend-stuck"><i class="fas fa-minus"></i></span>
                        <span class="percent-value">0%</span>
                    </div>
                    <h4 class="fw-bold text-danger">$10,390.90</h4>
                    <p class="text-muted">TOTAL COST</p>
                </div>
                <div class="col-md-3">
                    <div class="summary-percent mb-1">
                        <span class="trend-icon trend-up"><i class="fas fa-arrow-up"></i></span>
                        <span class="percent-value">20%</span>
                    </div>
                    <h4 class="fw-bold text-success">$24,813.53</h4>
                    <p class="text-muted">TOTAL PROFIT</p>
                </div>
                <div class="col-md-3">
                    <div class="summary-percent mb-1">
                        <span class="trend-icon trend-up"><i class="fas fa-arrow-up"></i></span>
                        <span class="percent-value">18%</span>
                    </div>
                    <h4 class="fw-bold text-info">1,200</h4>
                    <p class="text-muted">GOAL COMPLETIONS</p>
                </div>
            </div>
        </div>
    </div>
        </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Top Products Chart (guarded)
    var topEl = document.querySelector('#topProductsChart');
    if (topEl) {
        var productsOptions = {
            chart: {
                type: 'donut',
                height: 250,
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800
                }
            },
            series: [44, 55, 41, 17, 15],
            labels: ['Product A', 'Product B', 'Product C', 'Product D', 'Product E'],
            colors: ['#28a745', '#007bff', '#ffc107', '#dc3545', '#6c757d'],
            legend: {
                position: 'bottom',
                horizontalAlign: 'center'
            },
            responsive: [{
                breakpoint: 576,
                options: {
                    chart: { height: 200 },
                    legend: { position: 'bottom' }
                }
            }],
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%'
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) { return val; }
                }
            }
        };

        var productsChart = new ApexCharts(topEl, productsOptions);
        productsChart.render();
    }
});
</script>
@endpush