@extends('layouts.master')

@php
$first = true;
$count = 1;

@endphp

@section('content')
<h2 class="main-text">Transaksi Penjualan Nasabah</h2>
<!-- <div class="container-fluid d-flex justify-content-end col-11">
    <button class="btn btn-danger" onclick="window.location='{{route('admin.tambahPenjualanSampah')}}'">Penjualan Baru</button>
</div> -->
<div class="table-wrapper-section">
  @include('components/filterByDateInput')
    <table class="fl-table" id="dataTable">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Waktu Transaksi</th>
            <th>Kode Pelapak</th>
            <th>Nama Pelapak</th>
            <th>Kode Sampah</th>
            <th>Nama Sampah</th>
            <th>Harga Lapak</th>
            <th>Jml/Kg</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
          @foreach($penjualan as $penjualan)
          <tr>
            <td>{{$count++}}</td>
            <td>{{$penjualan->kodeTransaksi}}</td>
            <td>{{$penjualan->created_at}}</td>
            <td>L{{ str_pad($penjualan->pelapak->id, 6, '0', STR_PAD_LEFT) }}</td>
            <td>{{$penjualan->pelapak->nama}}</td>
            <td>{{$penjualan->dataSampah->kodeSampah}}</td>
            <td>{{$penjualan->dataSampah->nama}}</td>
            <td>Rp {{ number_format($penjualan->dataSampah->hargaLapak, 2) }}</td>
            <td>{{$penjualan->jumlah}}</td>
            <td>Rp {{ number_format($penjualan->total, 2) }}</td>
          </tr>
          @endforeach
        <tbody>
    </table>
</div>

@include('components/filterByDateScript')
<script>
  $(document).ready(function() {
    let dataTable = $('#dataTable').DataTable({
      dom: '<"top"l<"dataTableNewElement">>t<"bottom"ip>',
      initComplete: function() {
        $('.dataTableNewElement').html(
          '<button class="btn btn-danger tableAddButton my-1" onclick="window.location=\'{{ route("admin.tambahPenjualanSampah") }}\'">Penjualan Baru</button>');
        },
    });

    document.querySelectorAll('#min, #max').forEach((el) => {
      el.addEventListener('change', () => {
        console.log("Changed");
        dataTable.draw();
      });
    });
  });
</script>
@endsection