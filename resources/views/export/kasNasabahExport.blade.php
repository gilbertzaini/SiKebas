@extends('layouts/export')

@php $count = 1 @endphp

@section('judul')
<h5><b>Laporan Arus Kas Nasabah</b></h5>
@endsection

@section('content')

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Kode Nasabah</th>
            <th>Nama Nasabah</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>N{{ str_pad($record->nasabah->id, 6, '0', STR_PAD_LEFT) }}</td>
            <td>{{$record->nasabah->name}}</td>
            <td>{{$record->created_at}}</td>
            <td>{{$record->keterangan}}</td>
            @if($record->kategori == 'debet')
            <td>Rp {{ number_format($record->jumlah, 2, ',', '.') }}</td>
            <td>-</td>
            @else
            <td>-</td>
            <td>Rp {{ number_format($record->jumlah, 2, ',', '.') }}</td>
            @endif
            <td>Rp {{ number_format($record->saldoSementara, 2, ',', '.') }}</td>
        </tr>
        @endforeach
    <tbody>
</table>

@endsection