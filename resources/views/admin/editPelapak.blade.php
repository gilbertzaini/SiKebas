@extends('layouts.forms')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Input Pelapak</h3>
                    <p>Silahkan isi data di bawah ini.</p>
                    <x-form class="requires-validation" method="PATCH" action="{{route('admin.patchPelapak')}}" novalidate>

                        <input type="text" style="display:none" name="idPelapak" value="{{$pelapak->id}}" />

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="nama" value="{{$pelapak->nama}}" placeholder="Masukan Nama Panjang" required>
                            <div class="valid-feedback">Nama telah di isi!</div>
                            <div class="invalid-feedback">Nama tidak boleh kosong!</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="alamat" value="{{$pelapak->alamat}}" placeholder="Masukan Alamat" required>
                            <div class="valid-feedback">Alamat telah di isi!</div>
                            <div class="invalid-feedback">Alamat tidak boleh kosong!</div>
                        </div>

                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check" id="invalidCheck" required>
                            <label class="form-check-label">Saya telah mengisi data dengan benar!</label>
                            <div class="invalid-feedback">Tolong, isi data dengan benar!</div>
                        </div> -->


                        <div class="form-button mt-3">
                            <button class="btn btn-danger" onclick="window.location='{{route('admin.daftarPelapak')}}'">Kembali</button>
                            <button id="submit" type="submit" class="btn btn-primary">Registrasi</button>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection