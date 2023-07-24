  @extends('layouts.master')

  @section('content')
    <!-- Section Start -->
    <div class="card mx-2 mt-5 pt-5">
      <h2 class="text-uppercase">Data Kategori Sampah</h2>
        <div class="card-header d-flex justify-content-end">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <div class="input-group">
                <x-form action="{{route('admin.searchSampah')}}" class="input-group">
                  <input type="search" name="param" class="form-control rounded mx-3" placeholder="Cari jenis sampah..." aria-label="Search" aria-describedby="search-addon" />
                  <button type="submit" class="btn btn-outline-primary">Filter</button>
                  <button type="button" class="btn btn-outline-primary" onclick="window.location='{{route('admin.sampahBaru')}}'">Tambah</button>
                </x-form>            
              </div>
            </li>
          </ul>
        </div>

      <div class="row d-flex justify-content-center">
        @if($sampah->count() > 0)
          @foreach($sampah as $sampah)
          <div class="col-sm-3 my-3">
            <div class="card">
              <div class="card-body bg-card rounded text-white">
                <div class="d-flex mb-2">
                  <h5 class="card-title">Jenis: </h5>
                  <p class="card-text text-end ms-auto">{{$sampah->jenis}}</p>
                </div>
                <div class="d-flex mb-2">
                  <h5 class="card-title">Harga/kg</h5>
                  <p class="card-text text-end ms-auto">Rp. {{$sampah->harga}}</p>
                </div>
                <div class="d-flex">
                  <h5 class="card-title mt-2">Aksi : </h5>
                  <div class="d-flex text-end ms-auto">
                    <button class="btn btn-primary rounded-pill mx-1"><a href="{{route('admin.editSampah', ['id'=>$sampah->id])}}" class="text-white text-decoration-none">Edit</a></button>
                    <x-form method="DELETE" action="{{ route('admin.deleteSampah', ['id'=>$sampah->id]) }}">
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
            <h3 class="mx-auto">Belum Ada Sampah</h3>
          </div>
        @endif
      </div>
    </div>
    <!-- Section End -->
  @endsection