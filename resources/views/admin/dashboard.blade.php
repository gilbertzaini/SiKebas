@extends('layouts.master')

@section('content')
    <section>
        <div class="mt-5 card-group container-fluid d-flex flex-colum justify-content-center" style="background-color: #254038;">
            <div class="d-md-flex justify-content-sm-center align-items-sm-center flex-lg-row flex-md-column">
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <img src="{{ asset('assets/logo.png') }}" style="width: 180px; height: auto !important;">
                </div>
                <div class="d-md-flex justify-content-sm-center align-items-sm-center flex-lg-row flex-md-column">
                    <div class="d-flex mb-4">
                        <div class="mx-2">
                            <img src="{{ asset('assets/add-user.png') }}" class="img"
                                style="width: 80px; height: auto !important;">
                        </div>
                        <div id="text1">
                            <h3><strong class="text-white">Pengurus Baru</strong></h1>
                                <p class="text-white">Bulan ini</p>
                                <div class="d-flex mx-2">
                                    <div class="mt-2">
                                        <i class="gg-trending"></i>
                                    </div>
                                    <p style="font-size: 18px;">10 Orang</p>
                                </div>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="mx-2">
                            <img src="{{ asset('assets/group.png') }}" class="img"
                                style="width: 80px; height: auto !important;">
                        </div>
                        <div id="text1">
                            <h3><strong class="text-white">Nasabah</strong></h1>
                                <p class="text-white">Bulan ini</p>
                                <div class="d-flex mx-2">
                                    <div class="mt-2">
                                        <i class="gg-trending"></i>
                                    </div>
                                    <p style="font-size: 18px;">22 Orang</p>
                                </div>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="mx-2">
                            <img src="{{ asset('assets/shopping-online.png') }}" class="img"
                                style="width: 80px; height: auto !important;">
                        </div>
                        <div id="text1">
                            <h3><strong class="text-white">Transaksi Baru</strong></h1>
                                <p class="text-white">Bulan ini</p>
                                <div class="d-flex mx-2">
                                    <div class="mt-2">
                                        <i class="gg-trending"></i>
                                    </div>
                                    <p style="font-size: 18px;">40 Orang</p>
                                </div>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="mx-2">
                            <img src="{{ asset('assets/rupiah.png') }}" class="img"
                                style="width: 80px; height: auto !important;">
                        </div>
                        <div id="text1">
                            <h3><strong class="text-white">Saldo Baru</strong></h1>
                                <p class="text-white">Bulan ini</p>
                                <div class="d-flex mx-2">
                                    <div class="mt-2">
                                        <i class="gg-trending"></i>
                                    </div>
                                    <p style="font-size: 18px;">Rp 1.200.00</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 h-auto" src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(22).webp"
                            alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-auto" src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(15).webp"
                            alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-auto" src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(23).webp"
                            alt="Third slide">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script>
        const menu = () => document.body.classList.toggle("open");
    </script>
@endsection
