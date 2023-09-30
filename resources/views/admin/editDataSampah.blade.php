@extends('layouts.forms')

@section('content')
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Edit Data Sampah</h3>
                        <p>Silahkan isi data di bawah ini.</p>
                        <x-form method="patch" action="{{ route('admin.patchDataSampah') }}" class="requires-validation" novalidate>
                            <div class="d-flex justify-content-center">
                                <input type="text" name="kodeSampah" value="{{ $sampah->kodeSampah }}"
                                    style="display:none;" readonly />
                                <div class="col-md-12">
                                    <select class="form-select" name="kategori">
                                        <option>Silahkan Pilih Jenis Sampah</option>
                                        @foreach ($jenisSampah as $items)
                                            <option value="{{ $items->id }}"
                                                @if ($items->kategori == $sampah->jenis) selected @endif>{{ $items->kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <div class="formAlert">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Sampah"
                                    value="{{ $sampah->nama }}" required>
                                @error('nama')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="hargaPelapak"
                                    placeholder="Masukan Harga Pelapak" value="{{ $sampah->hargaLapak }}" required>
                                @error('hargaPelapak')
                                    <div class="formAlert">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="hargaNasabah"
                                    placeholder="Masukan Harga Nasabah" value="{{ $sampah->hargaNasabah }}" required>
                                @error('hargaNasabah')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-button mt-3">
                                <button class="btn btn-danger" type="button"
                                    onclick="window.location='{{ route('admin.dataSampah') }}'">Kembali</button>
                                <button id="submit" type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
