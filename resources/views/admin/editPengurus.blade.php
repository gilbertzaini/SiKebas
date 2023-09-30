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
              @error('name')
                <div class="formAlert">{{ $message }}</div>
              @enderror
            </div>

            @if(Auth::user()->jabatan != "Pengurus")
            <div class="col-md-12">
              <select class="form-control" type="text" name="jabatan">
                  <option value="Pengurus" @if($pengurus->jabatan == "Pengurus") selected @endif>Pengurus</option>
                  <option value="Bendahara" @if($pengurus->jabatan == "Bendahara") selected @endif>Bendahara</option>
                  <option value="Ketua" @if($pengurus->jabatan == "Ketua") selected @endif>Ketua</option>
              </select>
              @error('jabatan')
                  <div class="formAlert">{{ $message }}</div>
              @enderror
          </div>
          @endif

            <div class="col-md-12">
              <input type="text" name="alamat" class="form-control" id="validationCustom01" value="{{$pengurus->alamat}}" placeholder="Alamat" required>
              @error('alamat')
                <div class="formAlert">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12">
              <input type="text" name="telp" class="form-control" id="validationCustom02" value="{{$pengurus->no_telp}}" placeholder="Nomor Telepon" required>
              @error('telp')
                <div class="formAlert">{{ $message }}</div>
              @enderror
            </div>

            @if(Auth::user()->id == $pengurus->id)
            <p class="my-3">Silahkan isi data di bawah ini jika ingin mengubah username atau kata sandi.</p>

            <div class="col-md-12 mt-3">
              <input type="text" name="username" class="form-control" id="validationCustom02" value="{{$pengurus->username}}" placeholder="Username" required>
              @error('username')
                <div class="formAlert">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-12">
              <input type="password" name="oldPassword" class="form-control" id="validationCustom02" placeholder="Kata Sandi Sebelumnya">
              @if(session('error'))
                  <div class="formAlert">{{ session('error') }}</div>
              @endif
            </div>

            <div class="col-md-12 mt-3">
              <input type="password" name="password" class="form-control" id="validationCustom02" placeholder="Kata Sandi Baru">
              @error('username')
                <div class="formAlert">{{ $message }}</div>
              @enderror
            </div>
            @endif

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