@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Panel Administrativo</h1>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total Usuarios</h6>
                    <h3>{{ $totalUsers }}</h3>
                    <small class="text-muted">Usuarios registrados</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total Destinos</h6>
                    <h3>{{ $totalDestinations }}</h3>
                    <small class="text-muted">Destinos creados</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total Reservas</h6>
                    <h3>{{ $totalReservas }}</h3>
                    <small class="text-muted">Reservas registradas</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Ingresos (confirmadas)</h6>
                    <h3>S/ {{ number_format($totalIncome,2) }}</h3>
                    <small class="text-muted">Suma de reservas confirmadas</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5>Reservas por mes — {{ $year }}</h5>
                    <canvas id="monthlyChart" height="120"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5>Destinos más reservados</h5>
                    <canvas id="topChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const monthsLabels = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
    const monthsData = @json($monthsData);

    const ctx = document.getElementById('monthlyChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthsLabels,
            datasets: [{
                label: 'Reservas',
                data: monthsData,
                borderWidth: 1,
                backgroundColor: 'rgba(54,162,235,0.6)',
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    const topLabels = @json($topLabels);
    const topValues = @json($topValues);
    const ctx2 = document.getElementById('topChart').getContext('2d');
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: topLabels,
            datasets: [{
                data: topValues,
                backgroundColor: [
                    '#FF6384','#36A2EB','#FFCE56','#66BB6A','#9575CD','#FF7043'
                ]
            }]
        },
        options: { responsive: true }
    });
</script>
@endsection
