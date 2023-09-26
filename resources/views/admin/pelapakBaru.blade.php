@extends('layouts.forms')

@section('content')
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Tambah Pelapak</h3>
                        <p>Silahkan isi data di bawah ini.</p>
                        <x-form class="requires-validation" action="{{ route('admin.storePelapak') }}" novalidate>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Panjang"
                                    required>
                                @error('nama')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="alamat" placeholder="Masukan Alamat"
                                    required>
                                @error('alamat')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="noTelp"
                                    placeholder="Masukan Nomor Telepon" required>
                                @error('noTelp')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-button mt-3">
                                <button class="btn btn-danger"
                                    onclick="window.location='{{ route('admin.daftarPelapak') }}'">Kembali</button>
                                <button id="submit" type="submit" class="btn btn-primary">Registrasi</button>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
