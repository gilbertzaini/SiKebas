@extends('layouts.master')

@php
$count = 1
@endphp

@section('content')
<h2 class="main-text">Tabungan Nasabah</h2>

<!-- <div class="container-fluid d-flex justify-content-end col-11">
    <button class="btn btn-danger" onclick="window.location='{{route('admin.penarikanNasabah')}}'">Penarikan</button>
</div> -->
<div class="table-wrapper-section">
  @include('components/filterByDateInput')
  <table class="fl-table" id="dataTable">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Transaksi</th>
        <th>Waktu Transaksi</th>
        <th>Kode Nasabah</th>
        <th>Nama Nasabah</th>
        <th>Debet Nasabah</th>
        <th>Kredit Nasabah</th>
        <th>Saldo</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tabungan as $tabungan)
      <tr>
        <td>{{$count++}}</td>
        <td>{{$tabungan->kodeTransaksi}}</td>
        <td>{{$tabungan->created_at}}</td>
        <td>N{{ str_pad($tabungan->nasabah->id, 6, '0', STR_PAD_LEFT) }}</td>
        <td>{{$tabungan->nasabah->name}}</td>
        @if($tabungan->kategori == 'Debet')
        <td>Rp {{ number_format($tabungan->jumlah, 2, ',', '.') }}</td>
        <td>-</td>
        @else
        <td>-</td>
        <td>Rp {{ number_format($tabungan->jumlah, 2, ',', '.') }}</td>
        @endif
        <td>Rp {{ number_format($tabungan->saldoSementara, 2, ',', '.') }}</td>
        <td>{{$tabungan->keterangan}}</td>
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
          '<button class="btn btn-danger tableAddButton my-1" onclick="window.location=\'{{ route("admin.penarikanNasabah") }}\'">Penarikan</button>'
        );
      }
    });

    // Add event listeners to date inputs
    document.querySelectorAll('#min, #max').forEach((el) => {
      el.addEventListener('change', () => {
        console.log("Changed");
        dataTable.draw();
      });
    });
  });
</script>
@endsection