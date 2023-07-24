@extends('layouts.master')
@section('content')
  <h2 class="main-text">Tabungan Nasabah</h2>
  <div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
    <div class="table-wrapper-section">
      <caption>Tanggal : 15-Feb-23</caption>
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
        <tr>
            <td>1</td>
            <td>Aki</td>
            <td>Rp 10,000.00</td>
            <td>2.2</td>
            <td>Rp 22,000.00</td>
        </tr>
      <tbody>
    </table>
  </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <div class="table-wrapper-section">
        <caption>Tanggal : 15-Apr-23</caption>
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
            <tr>
                <td>1</td>
                <td>Aki</td>
                <td>Rp 10,000.00</td>
                <td>2.2</td>
                <td>Rp 22,000.00</td>
            </tr>
          <tbody>
        </table>
        </table>
      </div>
          </div>
          <div class="carousel-item">
      <div class="table-wrapper-section">
        <caption>Tanggal : 15-Jan-23</caption>
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
            <tr>
                <td>1</td>
                <td>Aki</td>
                <td>Rp 10,000.00</td>
                <td>2.2</td>
                <td>Rp 22,000.00</td>
            </tr>
          <tbody>
        </table>
        </table>
      </div>
  </div>
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