@extends('layouts/export')

@php
$count = 0;

$sumDebet = $debet->sum('jumlah');
$sumKredit = $kredit->sum('jumlah');
$sumLapak = $lapak->sum('total');

$keuanganNasabah = $sumDebet - $sumKredit;
if($keuanganNasabah > 0) $keuntunganBankSampah = $sumLapak - $keuanganNasabah;
else $keuntunganBankSampah = $sumLapak + $keuanganNasabah;

$arrDebet = $debet->toArray();
$arrKredit = $kredit->toArray();
$arrLapak = $lapak->toArray();

$rowDebet = count($arrDebet);
$rowKredit = count($arrKredit);
$rowLapak = count($arrLapak);

$row = max($rowDebet, $rowKredit, $rowLapak);
@endphp

@section('judul')
<h5><b>Laporan Keuangan Internal</b></h5>
@endsection

@section('content')

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Transaksi Debet</th>
            <th>Jumlah</th>
            <th>Transaksi Kredit</th>
            <th>Jumlah</th>
            <th>Transaksi Lapak</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < $row; $i++) <tr>
            @if($i < $rowDebet) <td>{{$arrDebet[$i]['kodeTransaksi']}}</td>
                <td>Rp {{ number_format($arrDebet[$i]['jumlah'], 2, ',', '.') }}</td>
                @else
                <td></td>
                <td></td>
                @endif

                @if($i < $rowKredit) <td>{{$arrKredit[$i]['kodeTransaksi']}}</td>
                    <td>Rp {{ number_format($arrKredit[$i]['jumlah'], 2, ',', '.') }}</td>
                    @else
                    <td></td>
                    <td></td>
                    @endif

                    @if($i < $rowLapak) <td>{{$arrLapak[$i]['kodeTransaksi']}}</td>
                        <td>Rp {{ number_format($arrLapak[$i]['total'], 2, ',', '.') }}</td>
                        @else
                        <td></td>
                        <td></td>
                        @endif
                        </tr>
                        @endfor
    </tbody>
    <tfoot>
        <tr>
            <td class="text-center">Total:</td>
            <td class="text-center">Rp {{ number_format($sumDebet, 2, ',', '.') }}</td>
            <td class="text-center">Total:</td>
            <td class="text-center">Rp {{ number_format($sumKredit, 2, ',', '.') }}</td>
            <td class="text-center">Total:</td>
            <td class="text-center">Rp {{ number_format($sumLapak, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="text-center">Total Keuangan Nasabah:</td>
            <td class="text-center">Rp {{ number_format($keuanganNasabah, 2, ',', '.') }}</td>
            <td></td>
            <td></td>
            <td class="text-center">Total Keuntungan Bank Sampah:</td>
            <td class="text-center">Rp {{ number_format($keuntunganBankSampah, 2, ',', '.') }}</td>
        </tr>
    </tfoot>
</table>

@endsection