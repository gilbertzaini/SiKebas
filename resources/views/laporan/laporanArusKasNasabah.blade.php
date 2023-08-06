@extends('layouts.master')

@section('content')
<h2 class="main-text">Laporan Arus Kas Nasabah</h2>

<div class="table-wrapper-section container-fluid col-11">
    <x-form class="row text-center d-flex justify-content-between align-items-center" action="{{ route('admin.laporanArusKasNasabahByDate') }}">
        <div class="col-5 justify-content-center align-self-center">
            <label for="tanggalMulai" class="form-label second-text">Periode: </label>
            <input type="date" name="tanggalMulai" @if($tanggalMulai !=NULL) value="{{$tanggalMulai}}" @endif />
        </div>

        <div class="col-5 justify-content-center align-self-center">
            <label for="tanggalSelesai" class="form-label second-text">Sampai: </label>
            <input type="date" name="tanggalSelesai" @if($tanggalSelesai !=NULL) value="{{ $tanggalSelesai }}" @endif />
        </div>

        <div class="col-2 container d-flex justify-content-center align-items-center pt-3">
            <button type="submit" class="btn btn-primary col-5">Pilih</button>
        </div>
    </x-form>
    <table class="fl-table">
        <thead>
            <tr>
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
</div>
@endsection