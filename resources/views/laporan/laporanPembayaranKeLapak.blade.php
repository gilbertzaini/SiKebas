@extends('layouts.master')

@php
$count = 1;
@endphp

@section('content')
<h2 class="main-text">Laporan Pembayaran ke Lapak&nbsp;</h2>
<div class="table-wrapper-section container-fluid col-11">
  <x-form class="row text-center d-flex justify-content-between align-items-center" action="{{ route('admin.laporanPembayaranKeLapakByDate') }}">
    @include('components/laporanDateFilter')
  </x-form>

  <table class="fl-table" id="dataTable">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Sampah</th>
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
      dom: '<"top"lf<"dataTableNewElement">>t<"bottom"ip>',
      initComplete: function() {
        $('.dataTableNewElement').html(
          '<button target="_blank" class="btn btn-secondary tableAddButton my-1" onclick="openNewTab(\'{{ route("admin.exportPembayaranLapak", ["tanggalMulai"=>$tanggalMulai, "tanggalSelesai"=>$tanggalSelesai]) }}\')">Cetak</button>');
      },

      columnDefs: [{
          targets: [1], // Index of the column you want to make searchable (0-based index)
          searchable: true
        },
        {
          targets: [0, 2, 3, 4], // Index of the column you want to make searchable (0-based index)
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