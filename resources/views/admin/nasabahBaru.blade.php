@extends('layouts.forms')

@section('content')
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Tambah Nasabah</h3>
                        <p>Silahkan isi data di bawah ini.</p>
                        <x-form action="{{ route('admin.storeNasabah') }}" class="requires-validation" novalidate>

                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" id="validationCustom01"
                                    value="{{ old('name') }}" placeholder="Nama Lengkap" required>
                                @error('name')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="text" name="alamat" class="form-control" id="validationCustom01"
                                    value="{{ old('alamat') }}" placeholder="Alamat" required>
                                @error('alamat')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="text" name="telp" class="form-control" id="validationCustom02"
                                    value="{{ old('telp') }}" placeholder="Nomor Telepon" required>
                                @error('telp')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-button mt-3">
                                <button class="btn btn-danger" type="button"
                                    onclick="window.location='{{ route('admin.daftarNasabah') }}'">Kembali</button>
                                <button id="submit" type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
