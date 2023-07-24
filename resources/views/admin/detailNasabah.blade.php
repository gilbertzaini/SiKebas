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
              @if($nasabah->saldo != NULL)
                <p class="card-text text-end ms-auto">Rp {{ number_format($nasabah->Saldo->saldo, 0, ',', '.') }}</p>
              @else
                <p class="card-text text-end ms-auto">Rp 0</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
        <h3 class="ps-5">Riwayat Transaksi</h3>
    </div>
    <div class="row d-flex justify-content-between">
        <div class="col-sm-6 my-3">
          <div class="card">
            <div class="card-body bg-card rounded text-white">
              <div class="d-flex mb-2">
                <h5 class="card-title">Kode Transaksi : </h5>
                <p class="card-text text-end ms-auto  ">SKBSI0001</p>
              </div>
              <div class="d-flex mb-2">
                <h5 class="card-title">Jenis Transaksi :</h5>
                <p class="card-text text-end ms-auto">Penjualan</p>
              </div>
              <div class="d-flex mb-2">
                <h5 class="card-title text-nowrap">Jenis Sampah :</h5>
                <p class="card-text text-end ms-auto">PP Air Mineral Gelas</p>
              </div>
              <div class="d-flex mb-2">
                <h5 class="card-title text-nowrap">Jumlah Sampah :</h5>
                <p class="card-text text-end ms-auto">5 Kg</p>
              </div>
              <div class="d-flex mb-2">
                <h5 class="card-title text-nowrap">Harga/kg :</h5>
                <p class="card-text text-end ms-auto">Rp 5.500</p>
              </div>
              <div class="d-flex mb-2">
                <h5 class="card-title text-nowrap">Jumlah :</h5>
                <p class="card-text text-end ms-auto">Rp 27.500</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 my-3">
          <div class="card">
            <div class="card-body bg-card rounded text-white">
              <div class="d-flex mb-2">
                <h5 class="card-title">Kode Transaksi : </h5>
                <p class="card-text text-end ms-auto  ">SKBSI0001</p>
              </div>
              <div class="d-flex mb-2">
                <h5 class="card-title">Jenis Transaksi : </h5>
                <p class="card-text text-end ms-auto">Pencairan</p>
              </div>
              <div class="d-flex">
                <h5 class="card-title mt-2">Jumlah : </h5>
                <p class="card-text text-end ms-auto">Rp 11.100</p>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- Section End -->
  <!-- Button -->
  <script src="../style/js/bootstrap.bundle.js"></script>
@endsection