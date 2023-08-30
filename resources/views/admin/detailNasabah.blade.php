@extends('layouts.master')

@section('content')
<!-- Section Start -->
<div class="container-fluid mx-2 mt-5 pt-5">
  <h3 class="ps-5">Informasi Nasabah</h3>
</div>
<div class="row d-flex justify-content-center">
  <div class="col-sm-9 my-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex mb-2">
          <h5 class="card-title">Nama Nasabah : </h5>
          <p class="card-text text-end ms-auto  ">{{$nasabah->name}}</p>
        </div>
        <div class="d-flex mb-2">
          <h5 class="card-title">No telpon :</h5>
          <p class="card-text text-end ms-auto">{{$nasabah->no_telp}}</p>
        </div>
        <div class="d-flex">
          <h5 class="card-title">Saldo Saat ini :</h5>
          <p class="card-text text-end ms-auto">Rp {{ number_format($nasabah->saldo, 2, ',', '.') }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <h3 class="ps-5">Riwayat Transaksi</h3>
</div>
<div class="container-fluid px-5 mx-auto row d-flex justify-content-between">
  <div class="col-sm-6 my-3">
  <h3>Setoran</h3>
  <table class="fl-table" id="dataTable">
    <thead>
      <th>Waktu Transaksi</th>
      <th>Kode Transaksi</th>
      <th>Jenis Sampah</th>
      <th>Jumlah Sampah</th>
      <th>Total</th>
    </thead>
    <tbody>
      @foreach($setoran as $setoran)
      <tr>
        <td>{{$setoran->created_at}}</td>
        <td>{{$setoran->kodeTransaksi}}</td>
        <td>{{$setoran->DataSampah->nama}}</td>
        <td>{{$setoran->berat}}</td>
        <td>Rp {{ number_format($setoran->subtotal, 2, ',', '.') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>

  <div class="col-sm-6 my-3">
  <h3>Penarikan</h3>
  <table class="fl-table" id="dataTable2">
    <thead>
      <th>Waktu Transaksi</th>
      <th>Kode Transaksi</th>
      <th>Jumlah</th>
      <th>Keterangan</th>
    </thead>
    <tbody>
      @foreach($penarikan as $penarikan)
      <tr>
        <td>{{$penarikan->created_at}}</td>
        <td>{{$penarikan->kodeTransaksi}}</td>
        <td>Rp {{ number_format($penarikan->jumlah, 2, ',', '.') }}</td>
        <td>{{$penarikan->keterangan}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      dom: '<"top"l>t<"bottom"ip>',
    });
  });

  $(document).ready(function() {
    $('#dataTable2').DataTable({
      dom: '<"top"l>t<"bottom"ip>',
    });
  });
</script>
@endsection