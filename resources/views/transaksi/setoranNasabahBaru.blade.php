@extends('layouts.forms')

@section('additionalHeadContent')
<style>
.nama {
    margin-top: -0.05rem !important;
    margin-bottom: 0.5rem !important;
}
</style>
@endsection

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Tambah Setoran Nasabah</h3>
                    <p>Silahkan isi data di bawah ini.</p>
                    <x-form class="requires-validation" action="{{route('admin.storeSetoranNasabahBaru')}}" novalidate>
                        <input class="form-control" type="text" name="idNasabah" value="{{$nasabah->id}}" style="display:none;">
                        <input class="form-control" type="text" name="idPengurus" value="{{$pengurus->id}}" style="display:none;">
                        
                        <label for="namaNasabah">Nama Nasabah</label>
                        <input class="form-control nama" type="text" name="namaNasabah" placeholder="Nama Nasabah" value="{{$nasabah->name}}" disabled>
                        
                        <label for="namaPengurus">Nama Pengurus</label>
                        <input class="form-control nama" type="text" name="namaPengurus" placeholder="Nama Nasabah" value="{{$pengurus->name}}" disabled>


                        <hr class="border-light border border-2">

                        <!-- <div class="d-flex">
                            <div class="col-md-4 mx-1">
                                <select class="form-select" aria-label="Default select example" required>
                                    <option>Kode Sampah</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select class="form-select" aria-label="Default select example" required>
                                    <option>Kode Kategori</option>
                                    <option value="1">1A</option>
                                    <option value="2">1B</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="col-md-12">
                            <select class="form-control" type="text" name="kodeSampah" placeholder="Nama Sampah" required>
                                <option>Nama Sampah - Harga/kg</option>
                                @foreach($sampah as $sampah)
                                <option value="{{$sampah->kodeSampah}}">{{$sampah->nama}} - Rp {{ number_format($sampah->hargaNasabah, 2, ',', '.') }}</option>
                                @endforeach
                            </select>
                            @error('kodeSampah')
                                <div class="formAlert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="berat" placeholder="Berat Sampah (Kg)">
                            @error('berat')
                                <div class="formAlert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-button mt-3">
                            <button class="btn btn-danger" type="button" onclick="window.location='{{route('admin.setoranNasabah')}}'">Kembali</button>
                            <button id="submit" type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection