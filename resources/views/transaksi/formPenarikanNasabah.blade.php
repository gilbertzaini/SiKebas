@extends('layouts.forms');

@section('content')
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Tambah Setoran Nasabah</h3>
                        <p>Silahkan isi data di bawah ini.</p>
                        <x-form class="requires-validation" action="{{ route('admin.storePenarikanNasabah') }}" novalidate>

                            <select class="form-select" name="idNasabah" aria-label="Default select example" required>
                                <option value="">Nama Nasabah</option>
                                @foreach ($nasabah as $nasabah)
                                    <option value="{{ $nasabah->id }}" @if (old('idNasabah') == $nasabah->id) selected @endif>
                                        {{ $nasabah->name }}</option>
                                @endforeach
                                @error('idNasabah')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </select>

                            <hr class="border-light border border-2 mt-3 mb-1">

                            <div class="mt-3">
                                <input style="height: 2.7rem;" class="form-control" type="number" name="tarik"
                                    placeholder="Jumlah" required>
                                <div class="valid-feedback">Penarikan telah di isi!</div>
                                <div class="invalid-feedback">Penarikan tidak boleh kosong</div>
                                @if (session('error'))
                                    <div style="color:red;">
                                        {{ session('error') }}
                                    </div>
                                    @error('tarik')
                                        <div class="formAlert">{{ $message }}</div>
                                    @enderror
                                @endif

                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="keterangan" placeholder="Keterangan">
                                @error('keterangan')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-button mt-3">
                                <button type="button" class="btn btn-danger"
                                    onclick="window.location='{{ route('admin.tabunganNasabah') }}'">Kembali</button>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
