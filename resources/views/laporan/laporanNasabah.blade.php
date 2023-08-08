@extends('layouts.master')

@php
$count = 0;
@endphp

@section('content')
<!-- Start Section -->
<h2 class="main-text">Laporan Rekap Total Sampah Penimbangan Nasabah</h2>
<div class="table-wrapper-section container-fluid col-11">
    <x-form class="row text-center d-flex justify-content-between align-items-center" action="{{ route('admin.laporanNasabahByDate') }}">
        <div class="col-5 justify-content-center align-self-center">
            <label for="tanggalMulai" class="form-label second-text">Periode: </label>
            <input type="date" name="tanggalMulai" @if($tanggalMulai != NULL) value="{{$tanggalMulai}}" @endif/>
        </div>

        <div class="col-5 justify-content-center align-self-center">
            <label for="tanggalSelesai" class="form-label second-text">Sampai: </label>
            <input type="date" name="tanggalSelesai" @if($tanggalSelesai != NULL) value="{{ $tanggalSelesai }}" @endif />
        </div>

        <div class="col-2 container d-flex justify-content-center align-items-center pt-3">
            <button type="submit" class="btn btn-primary col-5">Pilih</button>
        </div>
    </x-form>
    <table class="fl-table">
        <thead>
            <th>No</th>
            <th>Kode Sampah</th>
            <th>Nama Sampah</th>
            <th>Berat Total</th>
        </thead>
        <tbody>
            <!-- <tr>
                <td>{{$count++}}</td>
                @foreach($sampah as $item)
                <td>
                    @foreach($summedSetoran as $setoran)
                    @if($setoran->kodeSampah == $item->kodeSampah)
                    {{$setoran->totalBerat}}
                    @else
                    -
                    @endif
                    @endforeach
                </td>
                @endforeach
            </tr> -->
            @foreach($sampah as $item)
            <tr>
                <td>{{$count++}}</td>
                <td>{{$item->kodeSampah}}</td>
                <td>{{$item->nama}}</td>
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
                    -
                    @endif
                </td>

            </tr>
            @endforeach
        <tbody>
    </table>
</div>
@endsection