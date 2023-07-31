@extends('layouts.master')

@php
$count = 1;
@endphp

@section('content')
  <h2 class="main-text">Laporan Pembayaran ke Lapak&nbsp;</h2>
<div class="table-wrapper-section">
    <table class="fl-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga Lapak</th>
            <th>Jumlah / kg</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
          @foreach($records as $record)<tr>
            <td>{{$count++}}</td>
            <td>{{$record->dataSampah->nama}}</td>
            <td>Rp {{ number_format($record->hargaLapak, 0, ',', '.') }}</td>
            <td>{{$record->jumlah}}</td>
            <td>Rp {{ number_format($record->total, 0, ',', '.') }}</td>
          </tr>
          @endforeach
        
        <tbody>
  </table>
</div>
@endsection