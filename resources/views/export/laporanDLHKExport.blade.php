@extends('layouts/export')

@section('additionalHeadContent')
<style>
    .rightTransparent{
        border-right: transparent !important;
    }
    
    .leftTransparent{
        border-left: transparent !important;
    }

    .xTransparent{
        border-right: transparent !important;
        border-left: transparent !important;
    }
</style>
@endsection

@php
$count = 1;
$kodeKategori = 1;
$prevCategory = "none";
@endphp


@section('judul')
<h5><b>Laporan Untuk DLHK</b></h5>
@endsection

@section('content')

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>Kecamatan: </td>
            <td class="rightTransparent">Pamulang</td>
            <td class="leftTransparent"></td>
            <td>Kelurahan: </td>
            <td style="border-right: transparent !important;">Pamulang Barat</td>
        </tr>
        <tr>
            <td>Bank Sampah: </td>
            <td class="rightTransparent">Puri Pamulang RW 25</td>
            <td class="leftTransparent"></td>
            <td class="xTransparent"></td>
            <td class="xTransparent"></td>
        </tr>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>H. Lapak</th>
            <th>JML</th>
            <th>Rp</th>
        </tr>
    </thead>
    <tbody>
            @foreach($sampah as $item)
            @if($item->jenis != $prevCategory)
                @php 
                $count = 1;
                $prevCategory = $item->jenis;
                @endphp
                <tr class="category">
                    <td>{{$count++}}</td>
                    <td>{{$kodeKategori++}}</td>
                    <td>{{$prevCategory}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
            <tr>
                <td>{{$count++}}</td>
                <td>{{$item->kodeSampah}}</td>
                <td>{{$item->nama}}</td>
                <td>Rp {{ number_format($item->hargaLapak, 2, ',', '.') }}</td>
                <td>
                    @php $totalBerat = NULL; @endphp
                    @foreach($summedSetoran as $setoran)
                    @if($setoran->kodeSampah == $item->kodeSampah)
                    @php $totalBerat = $setoran->totalBerat; @endphp
                    @endif
                    @endforeach

                    @if($totalBerat != NULL)
                    {{$totalBerat}}
                    @else
                    @php $totalBerat = 0 @endphp
                    -
                    @endif
                </td>
                <td>Rp {{ number_format($totalBerat * $item->hargaLapak, 2, ',', '.') }}</td>
            </tr>
            @endforeach
    </tbody>
</table>

@endsection