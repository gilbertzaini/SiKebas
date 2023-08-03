@extends('layouts.master')

@section('content')
<!-- Section Start -->
<div class="mx-2">
  <h2 class="main-text">Data Nasabah</h2>
  <div class="card-header d-flex justify-content-end mx-5 px-4">
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

  <div class="table-wrapper-section">
    <table class="fl-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Nasabah</th>
          <th>Nama Nasabah</th>
          <th>Alamat</th>
          <th>No Telepon</th>
          <th>Saldo</th>
          <th>Aksi</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @if($nasabah->count() > 0)
        @php
        $no = 1;
        @endphp
        @foreach($nasabah as $nasabah)
        <tr>
          <td>{{ $no }}</td>
          <td>N{{ $nasabah->id }}</td>
          <td>{{ $nasabah->name }}</td>
          <td>{{ $nasabah->alamat }}</td>
          <td>{{ $nasabah->no_telp }}</td>
          @if($nasabah->saldo != NULL)
          <td>Rp {{ number_format($nasabah->Saldo->saldo, 2, ',', '.') }}</td>
          @else
          <td>Rp 0</td>
          @endif
          <td>
            <div class="d-flex justify-content-center">
              <button class="btn btn-primary rounded-pill">
                <a href="{{ route('admin.editNasabah', ['id'=>$nasabah->id]) }}" class="text-white text-decoration-none">Edit</a>
              </button>
              <x-form method="DELETE" action="{{ route('admin.deleteNasabah', ['id'=>$nasabah->id]) }}">
                <button class="btn btn-danger rounded-pill" id="btn-hapus">Hapus</button>
              </x-form>
            </div>
          </td>
          <td>
            <div class="d-flex justify-content-center mt-0">
              <a href="{{ route('admin.detailNasabah', ['id'=>$nasabah->id]) }}" class="btn btn-success rounded-pill px-5 text-decoration-none">Lihat Lebih Detail</a>
            </div>
          </td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
        @else
        <tr>
          <td colspan="8" class="text-center">Belum Ada Nasabah</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<!-- Section End -->
@endsection