@extends('layouts.masterNoNav')

@section('additionalHeadContent')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

    html,
    body {
        height: 100%;
        background-color: #fff;
        overflow: hidden;
    }


    .form-holder {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        min-height: 100vh;
    }

    .form-holder .form-content {
        position: relative;
        text-align: center;
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-align-items: center;
        align-items: center;
        padding: 60px;
    }

    .form-content .form-items {
        background-color: #254038;
        border: 3px solid;
        padding: 60px;
        display: inline-block;
        width: 100%;
        min-width: 540px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        text-align: left;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .form-content h3 {
        color: #fff;
        text-align: left;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .form-content h3.form-title {
        margin-bottom: 30px;
    }

    .form-content p {
        color: #fff;
        text-align: left;
        font-size: 17px;
        font-weight: 300;
        line-height: 20px;
        margin-bottom: 30px;
    }


    .form-content label,
    .was-validated .form-check-input:invalid~.form-check-label,
    .was-validated .form-check-input:valid~.form-check-label {
        color: #fff;
    }

    .form-content input[type=text],
    .form-content input[type=password],
    .form-content input[type=email],
    .form-content select {
        width: 100%;
        padding: 9px 20px;
        text-align: left;
        border: 0;
        outline: 0;
        border-radius: 6px;
        background-color: #fff;
        font-size: 15px;
        font-weight: 300;
        color: #000000;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
        margin-top: 16px;
    }


    .btn-primary {
        outline: none;
        border: 0px;
        box-shadow: none;
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active {
        background-color: #495056;
        outline: none !important;
        border: none !important;
        box-shadow: none;
    }

    .form-content textarea {
        position: static !important;
        width: 100%;
        padding: 8px 20px;
        border-radius: 6px;
        text-align: left;
        background-color: #fff;
        border: 0;
        font-size: 15px;
        font-weight: 300;
        color: #000000;
        outline: none;
        resize: none;
        height: 120px;
        -webkit-transition: none;
        transition: none;
        margin-bottom: 14px;
    }

    .form-content textarea:hover,
    .form-content textarea:focus {
        border: 0;
        background-color: #ebeff8;
        color: #8D8D8D;
    }

    .mv-up {
        margin-top: -9px !important;
        margin-bottom: 8px !important;
    }

    .invalid-feedback {
        color: #ff606e;
    }

    .valid-feedback {
        color: #2acc80;
    }
</style>
@endsection

@php
$kodeKategori =  1;
@endphp

@section('content')
<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Tambah Data Sampah</h3>
                    <p>Silahkan isi data di bawah ini.</p>
                    <x-form action="{{route('admin.storeDataSampahBaru')}}" class="requires-validation" novalidate>

                        <div class="d-flex justify-content-center">
                            <!-- <div class="col-md-2 mx-2">
                                <input class="form-control" type="text" name="name" placeholder="ID">
                            </div> -->

                            <div class="col-md-12">
                                <select class="form-select" name="kategori" aria-label="Default select example">
                                    <option>Silahkan Pilih Jenis Sampah</option>
                                    @foreach($jenisSampah as $jenis => $items)
                                    <option value="{{$kodeKategori++}}">{{$jenis}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">Jenis sampah telah di isi!</div>
                                <div class="invalid-feedback">Jenis sampah tidak boleh kosong</div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Sampah">
                            <div class="valid-feedback">Nama sampah telah di isi!</div>
                            <div class="invalid-feedback">Nama sampah tidak boleh kosong</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="hargaPelapak" placeholder="Masukan Harga Pelapak" required>
                            <div class="valid-feedback">Harga pelapak telah di isi!</div>
                            <div class="invalid-feedback">Harga pelapak tidak boleh kosong!</div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="hargaNasabah" placeholder="Masukan Harga Nasabah" required>
                            <div class="valid-feedback">Harga nasabah telah di isi!</div>
                            <div class="invalid-feedback">Harga nasabah tidak boleh kosong!</div>
                        </div>

                        <div class="form-button mt-3">
                            <button class="btn btn-danger" onclick="window.location='data-sampah.html'">Kembali</button>
                            <button id="submit" type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script>
    (function() {
        'use strict'
        const forms = document.querySelectorAll('.requires-validation')
        Array.from(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection