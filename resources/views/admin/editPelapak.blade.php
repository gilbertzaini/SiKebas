@extends('layouts.forms')

@section('content')
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Edit Pelapak</h3>
                        <p>Silahkan isi data di bawah ini.</p>
                        <x-form class="requires-validation" method="PATCH" action="{{ route('admin.patchPelapak') }}"
                            novalidate>

                            <input type="text" style="display:none" name="idPelapak" value="{{ $pelapak->id }}" />

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="nama" value="{{ $pelapak->nama }}"
                                    placeholder="Masukan Nama Panjang" required>
                                @error('nama')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="alamat" value="{{ $pelapak->alamat }}"
                                    placeholder="Masukan Alamat" required>
                                @error('alamat')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="noTelp" value="{{ $pelapak->no_telp }}"
                                    placeholder="Masukan Nomor Telepon" required>
                                @error('noTelp')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-button mt-3">
                                <button class="btn btn-danger"
                                    onclick="window.location='{{ route('admin.daftarPelapak') }}'">Kembali</button>
                                <button id="submit" type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
