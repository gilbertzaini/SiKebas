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
                        
                        <label>Nama Nasabah</label>
                        <input class="form-control" type="text" name="namaNasabah" placeholder="Nama Nasabah" value="{{$nasabah->name}}" disabled>
                        
                        <label>Nama Pengurus</label>
                        <input class="form-control" type="text" name="namaPengurus" placeholder="Nama Nasabah" value="{{$pengurus->name}}" disabled>


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
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="berat" placeholder="Berat Sampah">
                            <div class="valid-feedback">Harga Nasabah telah di isi!</div>
                            <div class="invalid-feedback">Harga Nasabah tidak boleh kosong!</div>
                        </div>

                        <div class="form-button mt-3">
                            <button class="btn btn-danger" onclick="window.location='setoran-nasabah.html'">Kembali</button>
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