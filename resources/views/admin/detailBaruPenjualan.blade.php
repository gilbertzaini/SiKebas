@extends('layouts.master')

@section('content')
	<h3 class="px-4">Detail Kategori</h3>
	<h3 class="px-4">Sampah</h3>
	<br>
	<button onclick="window.location.href = 'detail-baru-penjualan.html';">Penjualan</button>
	<button onclick="window.location.href = 'detail-baru-pencairan.html';">Pencairan Saldo</button>
	<form> 
		
	<div class="form-row px-3">
      <div class="col-md-9 mb-3">
		<label for="nNasabah">Nama Nasabah</label><br>
			<input type="text" id="nNasabah" name="nNasabah"><br>
		  </div>
		</div>
	<div class="form-row px-3">
      <div class="col-md-9 mb-3">
		<label for="jsampah">Jenis Sampah</label><br>
			<input type="text" id="jsampah" name="jsampah"><br>
		  </div>
		</div>
	<div class="form-row px-3">
      <div class="col-md-9 mb-3">
		<label for="harga">Harga/kg</label><br>
			<input type="text" id="harga" name="harga">
		  </div>
		</div>
	</form>
<h3 class="px-4">Ringkasan Kategori</h3>
	<div class="row d-flex justify-content">
      <div class="col-sm-3 my-3">
        <div class="card">
          <div class="card-body bg-card rounded text-white">
            <div class="d-flex mb-2">
              <h5 class="card-title">Harga/kg </h5>
              <p class="card-text text-end ms-auto  ">-</p>
            </div>
            <div class="d-flex mb-2">
              <h5 class="card-title">Total</h5>
              <p class="card-text text-end ms-auto">-</p>
			</div>
		  </div>
	    </div>
      </div>
    </div>
	<p class="px-2">Harga jual berubah? <a href="detail-baru.html">Perbarui data</a></p>
	<button class="btn btn-primary mx-4">Catat Transaksi</button>
@endsection
