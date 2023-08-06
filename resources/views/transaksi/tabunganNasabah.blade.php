@extends('layouts.master')

@php
$count = 1
@endphp

@section('content')
<h2 class="main-text">Tabungan Nasabah</h2>


<div class="container-fluid d-flex justify-content-end col-11">
    <button class="btn btn-danger" onclick="window.location='{{route('admin.penarikanNasabah')}}'">Penarikan</button>
</div>
<div class="table-wrapper-section">
    <table class="fl-table">
        <thead>
            <tr>
                <th>No</th>
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
                <td>{{$tabungan->created_at}}</td>
                <td>N{{$tabungan->nasabah->id}}</td>
                <td>{{$tabungan->nasabah->name}}</td>
                @if($tabungan->kategori == 'debet')
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
@endsection