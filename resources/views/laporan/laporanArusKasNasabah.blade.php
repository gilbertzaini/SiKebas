@extends('layouts.master')

@section('content')
<h2 class="main-text">Laporan Arus Kas Nasabah</h2>

<div class="table-wrapper-section container-fluid col-11">
    <x-form class="row text-center d-flex justify-content-between align-items-center" action="{{ route('admin.laporanArusKasNasabahByDate') }}">
        @include('components/laporanDateFilter')
    </x-form>
    
    <table class="fl-table" id="dataTable">
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
</div>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      dom: '<"top"l>t<"bottom"ip>',
    });
  });
</script>
@endsection