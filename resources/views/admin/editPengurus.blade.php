@extends('layouts.forms')

@section('content')
<div class="form-body">
  <div class="row">
    <div class="form-holder">
      <div class="form-content">
        <div class="form-items">
          <h3>Edit Pengurus</h3>
          <p>Silahkan isi data di bawah ini.</p>
          <x-form method="PATCH" action="{{route('admin.patchPengurus')}}" class="requires-validation" novalidate>
            <input type="text" style="display:none" name="idPengurus" value="{{$pengurus->id}}" />

            <div class="col-md-12">
              <input type="text" name="name" class="form-control" id="validationCustom01" value="{{$pengurus->name}}" placeholder="Nama Lengkap" required>
              <div class="valid-feedback">Nama telah di isi!</div>
              <div class="invalid-feedback">Nama tidak boleh kosong!</div>
            </div>

            <div class="col-md-12">
              <input type="text" name="alamat" class="form-control" id="validationCustom01" value="{{$pengurus->alamat}}" placeholder="Alamat" required>
              <div class="valid-feedback">Alamat telah di isi!</div>
              <div class="invalid-feedback">Alamat tidak boleh kosong!</div>
            </div>

            <div class="col-md-12">
              <input type="text" name="telp" class="form-control" id="validationCustom02" value="{{$pengurus->no_telp}}" placeholder="Nomor Telepon" required>
              <div class="valid-feedback">Nomor Telepon telah di isi!</div>
              <div class="invalid-feedback">Nomor Telepon tidak boleh kosong!</div>
            </div>

            <div class="col-md-12 mt-3">
              <input type="email" name="email" class="form-control" id="validationCustom02" value="{{$pengurus->email}}" placeholder="Saldo" required>
              <div class="valid-feedback">e-mail telah di isi!</div>
              <div class="invalid-feedback">e-mail tidak boleh kosong!</div>
            </div>

            <div class="col-md-12 mt-3">
              <input type="text" name="username" class="form-control" id="validationCustom02" value="{{$pengurus->username}}" placeholder="Saldo" required>
              <div class="valid-feedback">Username telah di isi!</div>
              <div class="invalid-feedback">Username tidak boleh kosong!</div>
            </div>

            <p class="my-3">Silahkan isi data di bawah ini jika ingin mengubah kata sandi.</p>

            <div class="col-md-12">
              <input type="password" name="oldPassword" class="form-control" id="validationCustom02" placeholder="Kata Sandi Sebelumnya">
              @if(session('error'))
                  <div class="invalid-feedback">{{ session('error') }}</div>
              @endif
            </div>

            <div class="col-md-12 mt-3">
              <input type="password" name="password" class="form-control" id="validationCustom02" placeholder="Kata Sandi Baru">
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