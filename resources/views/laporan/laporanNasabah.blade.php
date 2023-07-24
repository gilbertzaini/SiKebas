@extends('layouts.master')

@php
$count = 1;
@endphp

@section('content')
<!-- Start Section -->
<h2 class="main-text">Laporan Rekap Total Sampah Penimbangan Nasabah</h2>
<div class="table-wrapper-section">
    <table class="fl-table">
        <thead>
            <th>No</th>
            @foreach($sampah as $item)
            <th>{{$item->nama}}</th>
            @endforeach
        </thead>
        <tbody>
            <tr>
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
            </tr>
        <tbody>
    </table>
</div>
@endsection
