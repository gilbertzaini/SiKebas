@extends('layouts.master')

@php
$first = true;
$count = 1;

@endphp

@section('content')
<h2 class="main-text">Penjualan Sampah Nasabah</h2>
<div id="carouselExampleDark" class="carousel carousel-dark slide" style="min-height: 70vh;">
  <div class="carousel-inner" style="min-height: 55vh;">
    @foreach($nasabah as $nasabah)
    @php
      $penjualanNasabah = $penjualan->where('idNasabah', $nasabah->id);
    @endphp  
    <div class="carousel-item @if($first) active @endif" data-bs-interval="10000">
      <div class="table-wrapper-section">
        <h3>{{$nasabah->name}}</h3>
        <p>Tanggal : 15-Feb-23</p>
        @if($penjualanNasabah->count() > 0)
        <table class="fl-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>H. Lapak</th>
              <th>Jml/kg</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($penjualanNasabah as $penjualanNasabah)
            <tr>
              <td>{{$count++}}</td>
              <td>{{$penjualanNasabah->dataSampah->nama}}</td>
              <td>Rp {{ number_format($penjualanNasabah->hargaLapak, 0, ',', '.') }}</td>
              <td>{{$penjualanNasabah->jumlah}}</td>
              <td>Rp {{ number_format($penjualanNasabah->total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
          <tbody>
        </table>
        @else  
        <div class="d-flex align-items-center text-center" style="min-height: 48vh;" >
          <h3 class="mx-auto">Belum Ada Penjualan</h3>
        </div>
        @endif
      </div>
    </div>
    @php $first=false; $count=1; @endphp
    @endforeach
  </div>
  <button class="carousel-control-prev mt-5 pt-5 pe-5 mx-5" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next mt-5 pt-5 pe-5 mx-5" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endsection