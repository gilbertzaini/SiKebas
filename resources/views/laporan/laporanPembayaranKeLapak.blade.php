@extends('layouts.master')

@php
$count = 0;
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
            <td>{{$record->hargaLapak}}</td>
            <td>{{$record->jumlah}}</td>
            <td>{{$record->total}}</td>
        </tr>
          @endforeach
        
        <tbody>
  </table>
</div>
@endsection