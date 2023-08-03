@extends('layouts.master')

@section('content')
<!-- Section Start -->
<div class="mx-2">
  <h2 class="main-text">Data Kategori Sampah</h2>
  <div class="card-header d-flex justify-content-end mx-5 px-4">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <div class="input-group">
          <x-form action="{{route('admin.searchSampah')}}" class="input-group">
            <input type="search" name="param" class="form-control rounded mx-3" placeholder="Cari sampah..." aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-outline-primary">Filter</button>
            <button type="button" class="btn btn-outline-primary" onclick="window.location='{{route('admin.sampahBaru')}}'">Tambah</button>
          </x-form>
        </div>
      </li>
    </ul>
  </div>

  <div class="table-wrapper-section">
    <table class="fl-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Kategori Sampah</th>
          <th>Nama Kategori Sampah</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @if($sampah->count() > 0)
        @php
        $no = 1;
        @endphp
        @foreach($sampah as $sampah)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $sampah->id }}</td>
          <td>{{ $sampah->kategori }}</td>
          <td>
            <div class="d-flex justify-content-center">
              <button class="btn btn-primary rounded-pill">
                <a href="{{ route('admin.editSampah', ['id'=>$sampah->id]) }}" class="text-white text-decoration-none">Edit</a>
              </button>
              <x-form method="DELETE" action="{{ route('admin.deleteSampah', ['id'=>$sampah->id]) }}">
                <button class="btn btn-danger rounded-pill" id="btn-hapus">Hapus</button>
              </x-form>
            </div>
          </td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
        @else
        <tr>
          <td colspan="8" class="text-center">Belum Ada sampah</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<!-- Section End -->
@endsection