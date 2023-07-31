@extends('layouts.master')

@php
$count = 1
@endphp

@section('content')
<h2 class="main-text">Tabungan Nasabah</h2>
<div class="table-wrapper-section">
    <table class="fl-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
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
                <td>{{$tabungan->updated_at}}</td>
                <td>N{{$tabungan->user->id}}</td>
                <td>{{$tabungan->user->name}}</td>
                @if($tabungan->kategori == 'debet')
                <td>{{$tabungan->jumlah}}</td>
                <td>-</td>
                @else
                <td>-</td>
                <td>{{$tabungan->jumlah}}</td>
                @endif
                @if($tabungan->user->saldo != NULL)
                <td>Rp {{ number_format($tabungan->User->Saldo->saldo, 0, ',', '.') }}</td>
                @else
                <td>Rp 0</td>
                @endif
                <td>{{$tabungan->keterangan}}</td>
            </tr>
            @endforeach
        <tbody>
    </table>
</div>
@endsection