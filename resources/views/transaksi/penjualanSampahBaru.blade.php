@extends('layouts.forms')

@section('content')
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Tambah Penjualan Sampah</h3>
                        <p>Silahkan isi data di bawah ini.</p>
                        <x-form class="requires-validation" action="{{ route('admin.storePenjualanSampah') }}" novalidate>

                            <select class="form-select" name="idPelapak" aria-label="Default select example" required>
                                <option value="">Nama Pelapak</option>
                                @foreach ($pelapaks as $pelapak)
                                    <option value="{{ $pelapak->id }}" @if (old('idPelapak') == $pelapak->id) selected @endif>
                                        {{ $pelapak->nama }}</option>
                                @endforeach
                            </select>

                            <hr class="border-light border border-2 mt-3 mb-1">

                            <select class="form-select" name="kodeSampah" aria-label="Default select example" required>
                                <option value="">Nama Sampah (Berat)</option>
                                @foreach ($sampahs as $sampah)
                                    <option value="{{ $sampah->kodeSampah }}"
                                        @if (old('kodeSampah') == $sampah->kodeSampah) selected @endif>{{ $sampah->nama }}
                                        ({{ $sampah->stok }} Kg)</option>
                                @endforeach
                            </select>

                            <div class="mt-3">
                                <input style="height: 2.7rem;" class="form-control" type="number" name="berat"
                                    placeholder="Berat" required>
                                @if (session('error'))
                                    <div style="color:red;">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @error('berat')
                                    <div class="formAlert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-button mt-3">
                                <button type="button" class="btn btn-danger"
                                    onclick="window.location='{{ route('admin.transaksiPenjualanNasabah') }}'">Kembali</button>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
