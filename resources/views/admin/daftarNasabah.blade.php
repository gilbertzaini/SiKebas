@extends('layouts.master')

@section('content')
<!-- Section Start -->
<div class="card mx-2 mt-5 pt-5">
  <h2 class="text-uppercase">Data Nasabah</h2>
    <div class="card-header d-flex justify-content-end">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <div class="input-group">
            <x-form action="{{route('admin.searchNasabah')}}" class="input-group">
              <input type="search" name="param" class="form-control rounded mx-3" placeholder="Cari nasabah..." aria-label="Search" aria-describedby="search-addon" />
              <button type="submit" class="btn btn-outline-primary">Filter</button>
              <button type="button" class="btn btn-outline-primary" onclick="window.location='{{route('admin.nasabahBaru')}}'">Tambah</button>
            </x-form>            
          </div>
        </li>
      </ul>
    </div>

  <div class="row d-flex justify-content-center">
    @if($nasabah->count() > 0)
      @foreach($nasabah as $nasabah)
      <div class="col-sm-4 my-3">
        <div class="card">
          <div class="card-body bg-card rounded text-white">
            <div class="d-flex mb-2">
              <h5 class="card-title">Nama Nasabah : </h5>
              <p class="card-text text-end ms-auto  ">{{$nasabah->name}}</p>
            </div>
            <div class="d-flex mb-2">
              <h5 class="card-title">Jumlah Saldo :</h5>
              @if($nasabah->saldo != NULL)
              <p class="card-text text-end ms-auto">Rp {{ number_format($nasabah->Saldo->saldo, 0, ',', '.') }}</p>
              @else
              <p class="card-text text-end ms-auto">Rp 0</p>
              @endif
            </div>
            <div class="d-flex">
              <h5 class="card-title mt-2">Aksi : </h5>
              <div class="d-flex text-end ms-auto">
                <button class="btn btn-primary rounded-pill mx-1" onclick="window.location='{{route('admin.editNasabah', ['id'=>$nasabah->id])}}'">Edit</button>
                <x-form method="DELETE" action="{{ route('admin.deleteNasabah', ['id'=>$nasabah->id]) }}">
                  <button class="btn btn-danger rounded-pill" id="btn-hapus">Hapus</button>
                </x-form>
              </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
              <button class="btn btn-success rounded-pill col-6" onclick="window.location='{{route('admin.detailNasabah', ['id'=>$nasabah->id])}}'">Lihat Lebih Detail</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    @else
      <div class="d-flex align-items-center text-center" style="height: 80vh;">
        <h3 class="mx-auto">Belum Ada Nasabah</h3>
      </div>
    @endif
  </div>
</div>
<!-- Section End -->
<!-- Button -->
<div class="d-flex justify-content-end mx-3 my-5">  
  <a class="btn btn-primary rounded-circle" id="btn-tambah" href="{{route('admin.nasabahBaru')}}"><i class="bi bi-plus-circle text-white"></i></a>
</div>
@endsection