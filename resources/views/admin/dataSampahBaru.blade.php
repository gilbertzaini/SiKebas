@extends('layouts.forms')

@php
$kodeKategori =  1;
@endphp

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Tambah Data Sampah</h3>
                    <p>Silahkan isi data di bawah ini.</p>
                    <x-form action="{{route('admin.storeDataSampahBaru')}}" class="requires-validation" novalidate>

                        <div class="d-flex justify-content-center">
                            <!-- <div class="col-md-2 mx-2">
                                <input class="form-control" type="text" name="name" placeholder="ID">
                            </div> -->

                            <div class="col-md-12">
                                <select class="form-select" name="kategori" aria-label="Default select example">
                                    <option>Silahkan Pilih Jenis Sampah</option>
                                    @foreach($jenisSampah as $jenis => $items)
                                    <option value="{{$kodeKategori++}}">{{$jenis}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Jenis sampah telah di isi!</div>
                                <div class="invalid-feedback">Jenis sampah tidak boleh kosong</div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Sampah">
                            <div class="valid-feedback">Nama sampah telah di isi!</div>
                            <div class="invalid-feedback">Nama sampah tidak boleh kosong</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="hargaPelapak" placeholder="Masukan Harga Pelapak" required>
                            <div class="valid-feedback">Harga pelapak telah di isi!</div>
                            <div class="invalid-feedback">Harga pelapak tidak boleh kosong!</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="hargaNasabah" placeholder="Masukan Harga Nasabah" required>
                            <div class="valid-feedback">Harga nasabah telah di isi!</div>
                            <div class="invalid-feedback">Harga nasabah tidak boleh kosong!</div>
                        </div>

                        <div class="form-button mt-3">
                            <button class="btn btn-danger" onclick="window.location='{{route('admin.dataSampah')}}'">Kembali</button>
                            <button id="submit" type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection