@extends('layouts.forms')

@section('content')
<div class="form-body">
  <div class="row">
    <div class="form-holder">
      <div class="form-content">
        <div class="form-items">
          <h3>Edit Nasabah</h3>
          <p>Silahkan isi data di bawah ini.</p>
          <x-form method="PATCH" action="{{route('admin.patchNasabah')}}" class="requires-validation" novalidate>
            <input type="text" style="display:none" name="idNasabah" value="{{$nasabah->id}}" />

            <div class="col-md-12">
              <input type="text" name="name" class="form-control" id="validationCustom01" value="{{$nasabah->name}}" placeholder="Nama Lengkap" required>
              <div class="valid-feedback">Nama telah di isi!</div>
              <div class="invalid-feedback">Nama tidak boleh kosong!</div>
            </div>

            <div class="col-md-12">
              <input type="text" name="alamat" class="form-control" id="validationCustom01" value="{{$nasabah->alamat}}" placeholder="Alamat" required>
              <div class="valid-feedback">Alamat telah di isi!</div>
              <div class="invalid-feedback">Alamat tidak boleh kosong!</div>
            </div>

            <div class="col-md-12">
              <input type="text" name="telp" class="form-control" id="validationCustom02" value="{{$nasabah->no_telp}}" placeholder="Nomor Telepon" required>
              <div class="valid-feedback">Nomor Telepon telah di isi!</div>
              <div class="invalid-feedback">Nomor Telepon tidak boleh kosong!</div>
            </div>

            <div class="col-md-12 mt-3">
              <input type="number" name="saldo" class="form-control" style="height:2.7rem;" id="validationCustom02" value="{{$nasabah->saldo}}" placeholder="Saldo" required>
              <div class="valid-feedback">Saldo telah di isi!</div>
              <div class="invalid-feedback">Saldo tidak boleh kosong!</div>
            </div>

            <div class="form-button mt-3">
              <button class="btn btn-danger" type="button" onclick="window.location='{{route('admin.daftarNasabah')}}'">Kembali</button>
              <button id="submit" type="submit" class="btn btn-primary">Edit</button>
            </div>
          </x-form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection