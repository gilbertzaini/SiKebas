@extends('layouts.master')

@php
$count = 0;
@endphp

@section('content')
<!-- Start Section -->
<h2 class="main-text">Laporan Rekap Total Sampah Penimbangan Nasabah</h2>
<div class="table-wrapper-section container-fluid col-11">
    <x-form class="row text-center d-flex justify-content-between align-items-center" action="{{ route('admin.laporanNasabahByDate') }}">
        @include('components/laporanDateFilter')
    </x-form>
    <table class="fl-table" id="dataTable">
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

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            columnDefs: [{
                    targets: [2], // Index of the column you want to make searchable (0-based index)
                    searchable: true
                },
                {
                    targets: [0, 1, 3], // Index of the column you want to make searchable (0-based index)
                    searchable: false
                }
            ]
        });
    });
</script>
@endsection