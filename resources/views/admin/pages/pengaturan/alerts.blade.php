@extends('layouts.app')

@section('title', 'Sistem Peringatan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sistem Peringatan & Notifikasi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success btn-sm" onclick="refreshAlerts()">
                            <i class="fas fa-sync-alt"></i> Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Stock Alerts -->
                    <div class="alert-section mb-4">
                        <h4><i class="fas fa-boxes text-primary"></i> Peringatan Stok</h4>
                        @if(count($stockAlerts) > 0)
                            @foreach($stockAlerts as $alert)
                                <div class="alert alert-{{ $alert['severity'] === 'critical' ? 'danger' : 'warning' }} alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ $alert['message'] }}</strong><br>
                                    <small>
                                        Stok saat ini: {{ number_format($alert['current_stock'], 2) }} |
                                        Minimum: {{ number_format($alert['min_stock'], 2) }}
                                        @if($alert['type'] === 'bahan_baku')
                                            | Bahan: {{ $alert['item']->nama_bahan }}
                                        @else
                                            | Produk: {{ $alert['item']->nama_produk }}
                                        @endif
                                    </small>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i> Semua stok dalam kondisi baik
                            </div>
                        @endif
                    </div>

                    <!-- Production Alerts -->
                    <div class="alert-section mb-4">
                        <h4><i class="fas fa-cogs text-info"></i> Peringatan Produksi</h4>
                        @if(count($productionAlerts) > 0)
                            @foreach($productionAlerts as $alert)
                                <div class="alert alert-{{ $alert['severity'] === 'warning' ? 'warning' : 'info' }} alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ $alert['message'] }}</strong>
                                    @if(isset($alert['item']))
                                        <br><small>Produk: {{ $alert['item']->produk->nama_produk }}</small>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i> Tidak ada peringatan produksi
                            </div>
                        @endif
                    </div>

                    <!-- Expiry Alerts -->
                    <div class="alert-section mb-4">
                        <h4><i class="fas fa-calendar-times text-warning"></i> Peringatan Kadaluarsa</h4>
                        @if(count($expiryAlerts) > 0)
                            @foreach($expiryAlerts as $alert)
                                <div class="alert alert-{{ $alert['severity'] === 'critical' ? 'danger' : 'warning' }} alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ $alert['message'] }}</strong><br>
                                    <small>
                                        Tanggal Kadaluarsa: {{ $alert['item']->tanggal_kadaluarsa->format('d/m/Y') }} |
                                        Sisa: {{ $alert['days_left'] }} hari
                                    </small>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i> Tidak ada bahan yang akan kadaluarsa
                            </div>
                        @endif
                    </div>

                    <!-- Alert Summary -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ count(array_filter($stockAlerts, fn($a) => $a['severity'] === 'critical')) + count(array_filter($expiryAlerts, fn($a) => $a['severity'] === 'critical')) }}</h3>
                                    <p>Peringatan Kritis</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ count(array_filter($stockAlerts, fn($a) => $a['severity'] === 'warning')) + count(array_filter($expiryAlerts, fn($a) => $a['severity'] === 'warning')) + count(array_filter($productionAlerts, fn($a) => $a['severity'] === 'warning')) }}</h3>
                                    <p>Peringatan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ count(array_filter($productionAlerts, fn($a) => $a['severity'] === 'info')) }}</h3>
                                    <p>Informasi</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ count($stockAlerts) + count($productionAlerts) + count($expiryAlerts) == 0 ? 1 : 0 }}</h3>
                                    <p>Status Baik</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
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
<script>
function refreshAlerts() {
    location.reload();
}

// Auto refresh every 5 minutes
setInterval(function() {
    // Optional: Add a subtle indicator that alerts are being refreshed
    console.log('Refreshing alerts...');
}, 300000);
</script>
@endsection