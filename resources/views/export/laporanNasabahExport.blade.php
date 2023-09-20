@extends('layouts/export')

@php $count = 1 @endphp

@section('judul')
<h5><b>Rekap Total Penimbangan Nasabah</b></h5>
@endsection

@section('content')
<div class="container">
    <table class="table table-bordered table-striped">
        <thead>
            <th>No</th>
            <th>Kode Sampah</th>
            <th>Nama Sampah</th>
            <th>Berat Total</th>
        </thead>
        <tbody>
            </tr>
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