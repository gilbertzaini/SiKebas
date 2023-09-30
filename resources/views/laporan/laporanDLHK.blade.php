@extends('layouts.master')

@section('additionalHeadContent')
<style>
    .category {
        background: yellow !important;
    }
</style>
@endsection

@php
$count = 1;
$kodeKategori = 1;
$prevCategory = "none";
@endphp

@section('content')
<h2 class="main-text">Laporan Untuk DLHK</h2>

<div class="table-wrapper-section container-fluid col-11">
    <x-form class="row text-center d-flex justify-content-between align-items-center" action="{{ route('admin.laporanDLHKbyDate') }}">
        @include('components/laporanDateFilter')
    </x-form>

    <table class="fl-table" id="dataTable">
        <thead>
            <th>No</th>
            <th>Kode Sampah</th>
            <th>Nama Sampah</th>
            <th>H. Lapak</th>
            <th>JML</th>
            <th>Rp</th>
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
        <tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            dom: '<"top"lf<"dataTableNewElement">>t<"bottom"ip>',
            ordering: false,
            initComplete: function() {
                $('.dataTableNewElement').html(
                    '<button target="_blank" class="btn btn-secondary tableAddButton my-1" onclick="openNewTab(\'{{ route("admin.exportLaporanDLHK", ["tanggalMulai"=>$tanggalMulai, "tanggalSelesai"=>$tanggalSelesai]) }}\')">Cetak</button>'
                );
            },

            columnDefs: [{
                    targets: [2], // Index of the column you want to make searchable (0-based index)
                    searchable: true
                },
                {
                    targets: [0, 1, 3, 4, 5], // Index of the column you want to make searchable (0-based index)
                    searchable: false
                }
            ]
        });
    });

    function openNewTab(url) {
        window.open(url, '_blank');
    }
</script>
@endsection