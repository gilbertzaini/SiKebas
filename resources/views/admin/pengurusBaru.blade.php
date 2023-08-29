@extends('layouts.forms')

@section('content')
<div class="form-body">
  <div class="row">
    <div class="form-holder">
      <div class="form-content">
        <div class="form-items">
          <h3>Tambah Pengurus</h3>
          <p>Silahkan isi data di bawah ini.</p>
          <x-form action="{{route('admin.storePengurus')}}" class="requires-validation" novalidate>

            <div class="col-md-12">
              <input type="text" name="name" class="form-control" id="validationCustom01" value="{{old('name')}}" placeholder="Nama Lengkap" required>
              <div class="valid-feedback">Nama telah di isi!</div>
              <div class="invalid-feedback">Nama tidak boleh kosong!</div>
            </div>

            <div class="col-md-12">
              <input type="text" name="alamat" class="form-control" id="validationCustom01" value="{{old('alamat')}}" placeholder="Alamat" required>
              <div class="valid-feedback">Alamat telah di isi!</div>
              <div class="invalid-feedback">Alamat tidak boleh kosong!</div>
            </div>

            <div class="col-md-12">
              <input type="text" name="telp" class="form-control" id="validationCustom02" value="{{old('telp')}}" placeholder="Nomor Telepon" required>
              <div class="valid-feedback">Nomor Telepon telah di isi!</div>
              <div class="invalid-feedback">Nomor Telepon tidak boleh kosong!</div>
            </div>

            <div class="col-md-12 mt-3">
              <input type="email" name="email" class="form-control" id="validationCustom02" value="{{old('email')}}" placeholder="e-mail" required>
              <div class="valid-feedback">e-mail telah di isi!</div>
              <div class="invalid-feedback">e-mail tidak boleh kosong!</div>
            </div>

            <div class="col-md-12 mt-3">
              <input type="text" name="username" class="form-control" id="validationCustom02" value="{{old('usrename')}}" placeholder="Username" required>
              <div class="valid-feedback">Username telah di isi!</div>
              <div class="invalid-feedback">Username tidak boleh kosong!</div>
            </div>

            <div class="col-md-12">
              <input type="password" name="password" class="form-control" id="validationCustom02" placeholder="Kata Sandi">
              <div class="valid-feedback">Password telah di isi!</div>
              <div class="invalid-feedback">Password tidak boleh kosong!</div>
            </div>

            <div class="form-button mt-3">
              <button class="btn btn-danger" type="button" onclick="window.location='{{route('admin.daftarPengurus')}}'">Kembali</button>
              <button id="submit" type="submit" class="btn btn-primary">Edit</button>
            </div>
          </x-form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection