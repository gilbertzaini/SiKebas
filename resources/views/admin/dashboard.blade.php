@extends('layouts.master')

@section('additionalHeadContent')
<style>
  .icons {
    width: 60px  !important;
    height:  60px !important;
  }
</style>
@endsection

@section('content')
  <!-- Section -->
  <section class="jumbotron">
    <div class="container mt-5">
      <div class="container-fluid">
        <div class="row align-items-center">
          <h1 class="text-white text-center my-5 ">Dashboard</h1>
          <div class="col mt-5">
            <img src="../assets/add-user.png" class="img icons">
            <div id="text1">
              <h1><strong class="text-white">Total Pengurus</strong></h1>
              <!-- <p class="text-white">Bulan ini</p> -->
              <div class="d-flex container mt-4">
                <i class="gg-trending"></i>
                <p>{{$pengurus->count()}}</p>
              </div>
            </div>
          </div>
          <div class="col mt-5">
            <div class="container-fluid">
              <img src="../assets/group.png" class="img icons">
              <div id="text1">
                <h1><strong class="text-white">Total Nasabah</strong></h1>
                <!-- <p class="text-white">Bulan ini</p> -->
                <div class="d-flex container mt-4">
                  <i class="gg-trending"></i>
                  <p>{{$nasabah->count()}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col mt-5">
            <div class="container-fluid">
              <img src="../assets/shopping-online.png" class="img icons" id="img1">
              <div id="text1">
                <h1><strong class="text-white">TotalTransaksi</strong></h1>
                <!-- <p class="text-white">Bulan ini</p> -->
                <div class="d-flex container mt-4">
                  <i class="gg-trending"></i>
                  <p>{{$transaction}}</p>
                </div>
              </div>
          </div>
          </div>
          <div class="col mt-5">
            <div class="container-fluid">
              <img src="../assets/dollar.png" class="img icons" id="img2">
              <div id="text1">
                <h1><strong class="text-white">Total Saldo</strong></h1>
                <!-- <p class="text-white">Bulan ini</p> -->
                <div class="d-flex container mt-4">
                  <i class="gg-trending"></i>
                  <p>Rp. {{ number_format($saldo, 2, ',', '.') }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,96L60,85.3C120,75,240,53,360,53.3C480,53,600,75,720,112C840,149,960,203,1080,213.3C1200,224,1320,192,1380,176L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
@endsection