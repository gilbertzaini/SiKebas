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
            dom: '<"top"lf<"dataTableNewElement">>t<"bottom"ip>',
            initComplete: function() {
                $('.dataTableNewElement').html(
                    '<button target="_blank" class="btn btn-secondary tableAddButton my-1" onclick="openNewTab(\'{{ route("admin.exportLaporanNasabah", ["tanggalMulai"=>$tanggalMulai, "tanggalSelesai"=>$tanggalSelesai]) }}\')">Cetak</button>');
            },

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

    function openNewTab(url) {
            window.open(url, '_blank');
        }
</script>
@endsection