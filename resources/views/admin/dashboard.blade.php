@extends('layouts.master')

@section('content')
    <section>
        <div class="mt-5 card-group container-fluid d-flex flex-column justify-content-center"
            style="background-color: #254038; min-height:100vh;">
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
                            <h3><strong class="text-white">Total Pengurus</strong></h3>
                            <div class="d-flex mx-2">
                                <div class="mt-2">
                                    <i class="gg-trending"></i>
                                </div>
                                <p style="font-size: 1.1rem;">{{ $pengurus->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="mx-2">
                            <img src="{{ asset('assets/group.png') }}" class="img"
                                style="width: 80px; height: auto !important;">
                        </div>
                        <div id="text1">
                            <h3><strong class="text-white">Total Nasabah</strong></h3>
                            <div class="d-flex mx-2">
                                <div class="mt-2">
                                    <i class="gg-trending"></i>
                                </div>
                                <p style="font-size: 1.1rem;">{{ $nasabah->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="mx-2">
                            <img src="{{ asset('assets/shopping-online.png') }}" class="img"
                                style="width: 80px; height: auto !important;">
                        </div>
                        <div id="text1">
                            <h3><strong class="text-white">Transaksi Baru</strong></h3>
                            <div class="d-flex mx-2">
                                <div class="mt-2">
                                    <i class="gg-trending"></i>
                                </div>
                                <p style="font-size: 1.1rem;">{{ $transaction }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="mx-2">
                            <img src="{{ asset('assets/rupiah.png') }}" class="img"
                                style="width: 80px; height: auto !important;">
                        </div>
                        <div id="text1">
                            <h3><strong class="text-white">Saldo</strong></h3>
                            <div class="d-flex mx-2">
                                <div class="mt-2">
                                    <i class="gg-trending"></i>
                                </div>
                                <p style="font-size: 1.1rem;">Rp {{ number_format($saldo, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="carouselExampleControlsNoTouching" class="carousel slide mx-auto mb-5" style="width: 85vw; height: 60vh;" data-bs-touch="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-auto h-100" src="{{ asset('assets/gallery1.jpeg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-auto h-100" src="{{ asset('assets/gallery2.jpeg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-auto h-100" src="{{ asset('assets/gallery3.jpeg') }}" alt="Third slide">
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
