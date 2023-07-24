@extends('layouts.master')
@section('content')
  <h2 class="main-text">Setoran Nasabah</h2>
<div class="table-wrapper-section">
    <table class="fl-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Waktu Transaksi</th>
            <th>Kode Transaksi</th>
            <th>Kode Sampah</th>
            <th>Nama Sampah</th>
            <th>Harga Nasabah</th>
            <th>Berat (KG)</th>
            <th>Sub-Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>15-4-23</td>
            <td>T0001</td>
            <td>S1A</td>
            <td>Alumunium A</td>
            <td>Rp 350,000.00</td>
            <td>5</td>
            <td>Rp 1,750,000.00</td>
        </tr>
        <tr style="border: solid black 1px;">
            <td></td>
            <td><strong>Total</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>   
            <td style="border: 1px black solid;"><strong>Rp 1,750,000.00</strong></td>
        </tr>
        <tbody>
    </table>
    <div class="row">
        <div class="col">
          <h3 class="text-center second-text">Nama Nasabah</h3>
          <h5 class="text-center third-text">Udin</h5>
        </div>
        <div class="col">
            <h3 class="text-center second-text">Nama Pengurus</h3>
            <h5 class="text-center third-text">Ipul</h5>
        </div>
      </div>
</div>
@endsection