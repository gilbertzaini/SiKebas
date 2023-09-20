@extends('layouts/export')

@php $count = 1 @endphp

@section('judul')
<h5><b>Laporan Pembayaran Ke Lapak</b></h5>
@endsection

@section('content')
<table class="table table-bordered table-striped">
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
        @foreach($sampah as $item)
        <tr>

            @php $totalBerat = NULL; @endphp
            @foreach($summedBerat as $berat)
            @if($berat->kodeSampah == $item->kodeSampah)
            @php $totalBerat = $berat->totalBerat; @endphp
            @endif
            @endforeach

            <td>{{$count++}}</td>
            <td>{{$item->nama}}</td>
            <td>Rp {{ number_format($item->hargaLapak, 2, ',', '.') }}</td>
            <td>
                @if($totalBerat != NULL)
                {{$totalBerat}}
                @else
                -
                @endif
            </td>
            <td>Rp {{ number_format($item->hargaLapak * $totalBerat, 2, ',', '.') }}</td>
        </tr>
        @endforeach
    <tbody>
</table>
@endsection