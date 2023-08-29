@extends('layouts.master')

@php
$count = 1;
@endphp

@section('content')
<h2 class="main-text">Laporan Pembayaran ke Lapak&nbsp;</h2>
<div class="table-wrapper-section container-fluid col-11">
    <x-form class="row text-center d-flex justify-content-between align-items-center" action="{{ route('admin.laporanPembayaranKeLapakByDate') }}">
        <div class="col-5 justify-content-center align-self-center">
            <label for="tanggalMulai" class="form-label second-text">Periode: </label>
            <input type="date" name="tanggalMulai" @if($tanggalMulai !=NULL) value="{{$tanggalMulai}}" @endif />
        </div>

        <div class="col-5 justify-content-center align-self-center">
            <label for="tanggalSelesai" class="form-label second-text">Sampai: </label>
            <input type="date" name="tanggalSelesai" @if($tanggalSelesai !=NULL) value="{{ $tanggalSelesai }}" @endif />
        </div>

        <div class="col-2 container d-flex justify-content-center align-items-center pt-3">
            <button type="submit" class="btn btn-primary col-5">Pilih</button>
        </div>
    </x-form>

  <table class="fl-table" id="dataTable">
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
</div>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      dom: '<"top"l>t<"bottom"ip>',
    });
  });
  
</script>
@endsection