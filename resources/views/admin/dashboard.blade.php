@extends('layouts.master')

@section('content')
<section>
  <div class="jumbotron mt-3">
    <div class="mt-2 d-flex justify-center flex-column justify-content-center">
      <div class="d-flex justify-content-center align-items-center mb-5">
        <img src="{{asset('assets/iPhone_14_Pro_Max_-_1-removebg-preview.png')}}" style="width: 180px; height: auto !important;">
      </div>
      <div class="d-md-flex justify-content-sm-center align-items-sm-center flex-lg-row flex-md-column">
        <div class="d-flex mb-4">
          <div class="mx-2">
            <img src="{{asset('assets/add-user.png')}}" class="img" style="width: 80px; height: auto !important;">
          </div>
          <div id="text1">
            <h3 class="my-3"><strong class="text-white">Total Pengurus</strong></h1>
              <!-- <p class="text-white">Bulan ini</p> -->
              <div class="d-flex mx-2">
                <div class="mt-2">
                  <i class="gg-trending"></i>
                </div>
                <p style="font-size: 18px;">{{$pengurus->count()}} Orang</p>
              </div>
          </div>
        </div>
        <div class="d-flex mb-4">
          <div class="mx-2">
            <img src="{{asset('assets/group.png')}}" class="img" style="width: 80px; height: auto !important;">
          </div>
          <div id="text1">
            <h3 class="my-3"><strong class="text-white">Total Nasabah</strong></h1>
              <!-- <p class="text-white">Bulan ini</p> -->
              <div class="d-flex mx-2">
                <div class="mt-2">
                  <i class="gg-trending"></i>
                </div>
                <p style="font-size: 18px;">{{$nasabah->count()}} Orang</p>
              </div>
          </div>
        </div>
        <div class="d-flex mb-4">
          <div class="mx-2">
            <img src="{{asset('assets/shopping-online.png')}}" class="img" style="width: 80px; height: auto !important;">
          </div>
          <div id="text1">
            <h3 class="my-3"><strong class="text-white">Total Transaksi</strong></h1>
              <!-- <p class="text-white">Bulan ini</p> -->
              <div class="d-flex mx-2">
                <div class="mt-2">
                  <i class="gg-trending"></i>
                </div>
                <p style="font-size: 18px;">{{$transaction}}</p>
              </div>
          </div>
        </div>
        <div class="d-flex mb-4">
          <div class="mx-2">
            <img src="{{asset('assets/dollar.png')}}" class="img" style="width: 80px; height: auto !important;">
          </div>
          <div id="text1">
            <h3 class="my-3"><strong class="text-white">Total Saldo</strong></h1>
              <!-- <p class="text-white">Bulan ini</p> -->
              <div class="d-flex mx-2">
                <div class="mt-2">
                  <i class="gg-trending"></i>
                </div>
                <p style="font-size: 18px;">Rp. {{ number_format($saldo, 2, ',', '.') }}</p>
              </div>
          </div>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffff" fill-opacity="1" d="M0,96L60,85.3C120,75,240,53,360,53.3C480,53,600,75,720,112C840,149,960,203,1080,213.3C1200,224,1320,192,1380,176L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
  </div>
</section>

<main>
  <div class="text-center container-gallery-dashboard fw-bold mb-3">
    <h1 id="gallery-dashboard">GALERI</h1>
  </div>
  <div id="carouselExampleDark" class="carousel carousel-dark slide px-5">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(22).webp" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-white">
          <h5>Gambar 1</h5>
          <p>...</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(15).webp" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-white">
          <h5>Gambar 2</h5>
          <p>...</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(23).webp" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-white">
          <h5>Gambar 3</h5>
          <p>...</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</main>
@endsection