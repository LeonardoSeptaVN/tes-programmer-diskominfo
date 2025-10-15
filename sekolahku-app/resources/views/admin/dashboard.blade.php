@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="mb-4">Dashboard Admin</h2>
   <div class="mb-2 d-flex gap-2 align-items-center">
        <a href="{{ url()->previous() }}" class="btn btn-link p-0 d-flex align-items-center text-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
            </svg>
            Kembali
        </a>            
    </div>

  <div class="card">
    <div class="card-body">
      <canvas id="chartPeserta" width="400" height="200"></canvas>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('chartPeserta').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: @json($labels),
      datasets: [{
        label: 'Jumlah Peserta per Course',
        data: @json($data),
        borderWidth: 1
      }]
    },
    options: {
      scales: { y: { beginAtZero: true, precision: 0 } }
    }
  });
</script>
@endsection