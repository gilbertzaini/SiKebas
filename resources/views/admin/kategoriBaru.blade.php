@extends('layouts.forms')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Tambah Kategori Sampah</h3>
                    <p>Silahkan isi data di bawah ini.</p>
                    <x-form class="requires-validation" action="{{route('admin.storeSampah')}}" novalidate>
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="kategori" placeholder="Kategori">
                            @error('kategori')
                                <div class="formAlert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-button mt-3">
                            <button type="button" class="btn btn-danger" onclick="window.location='{{route('admin.kategoriSampah')}}'">Kembali</button>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection