@extends('layouts.master')

@section('content')
  <!-- Section Start -->
  <div class="card mx-2">
    <div class="card-header d-flex justify-content-end">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <x-form action="{{route('admin.searchPengurus')}}" class="input-group">
            <input type="search" name="param" class="form-control rounded mx-3" placeholder="Cari jenis pengurus..." aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-outline-primary">Filter</button>
            <a href="{{route('admin.exportPengurus')}}" class="btn btn-outline-primary">Export</a>
          </x-form>          
        </li>
      </ul>
    </div>
    <div class="row d-flex justify-content-center">
      @if($pengurus->count() > 0)
        @foreach($pengurus as $pengurus)
        <div class="col-sm-3 my-3">
          <div class="card">
            <div class="card-body bg-card rounded text-white">
              <div class="d-flex mb-2">
                <h5 class="card-title">Nama Pengurus: </h5>
                <p class="card-text text-end ms-auto">{{$pengurus->name}}</p>
              </div>
              <div class="d-flex mb-2">
                <h5 class="card-title">No Telepon:</h5>
                <p class="card-text text-end ms-auto">{{$pengurus->no_telp}}</p>
              </div>
              <div class="d-flex">
                <h5 class="card-title mt-2">Aksi : </h5>
                <div class="d-flex text-end ms-auto">
                  <button class="btn btn-primary rounded-pill mx-1"><a href="{{route('admin.editPengurus', ['id'=>$pengurus->id])}}" class="text-white text-decoration-none">Edit</a></button>
                  <x-form method="DELETE" action="{{ route('admin.deletePengurus', ['id'=>$pengurus->id]) }}">
                    <button class="btn btn-danger rounded-pill" id="btn-hapus">Hapus</button>
                  </x-form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      @else        
        <div class="d-flex align-items-center text-center" style="height: 80vh;">
          <h3 class="mx-auto">Belum Ada Pengurus</h3>
        </div>
      @endif
    </div>
  </div>
  <!-- Section End -->
  <!-- Button -->
  <div class="d-flex justify-content-end mx-3 my-5">  
    <a class="btn btn-primary rounded-circle" id="btn-tambah" href="{{route('admin.pengurusBaru')}}"><i class="bi bi-plus-circle text-white"></i></a>
  </div>
@endsection