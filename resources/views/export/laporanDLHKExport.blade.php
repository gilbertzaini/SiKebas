@extends('layouts/export')

@section('additionalHeadContent')
    <style>
        .rightTransparent {
            border-right: transparent !important;
        }

        .leftTransparent {
            border-left: transparent !important;
        }

        .xTransparent {
            border-right: transparent !important;
            border-left: transparent !important;
        }

        .noBorder {
          border: transparent !important;
        }

        .category {
            background: yellow !important;
        }
    </style>
@endsection

@php
    $count = 1;
    $kodeKategori = 1;
    $prevCategory = 'none';
@endphp


@section('judul')
    <h5><b>Laporan Untuk DLHK</b></h5>
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <td class="noBorder">Kecamatan: </td>
                <td class="noBorder">Pamulang</td>
                <td class="noBorder"></td>
                <td class="noBorder">Kelurahan: </td>
                <td class="noBorder">Pamulang Barat</td>
            </tr>
            <tr>
                <td class="noBorder">Bank Sampah: </td>
                <td class="noBorder">Puri Pamulang RW 25</td>
                <td class="noBorder"></td>
                <td class="noBorder"></td>
                <td class="noBorder"></td>
            </tr>
        </thead>
    </table>
    <table class="table table-bordered table-striped">
        <thead>
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
            @foreach ($sampah as $item)
                @if ($item->jenis != $prevCategory)
                    @php
                        $count = 1;
                        $prevCategory = $item->jenis;
                    @endphp
                    <tr class="category">
                        <td>{{ $count++ }}</td>
                        <td>{{ $kodeKategori++ }}</td>
                        <td>{{ $prevCategory }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $item->kodeSampah }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>Rp {{ number_format($item->hargaLapak, 2, ',', '.') }}</td>
                    <td>
                        @php $totalBerat = NULL; @endphp
                        @foreach ($summedSetoran as $setoran)
                            @if ($setoran->kodeSampah == $item->kodeSampah)
                                @php $totalBerat = $setoran->totalBerat; @endphp
                            @endif
                        @endforeach

                        @if ($totalBerat != null)
                            {{ $totalBerat }}
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
