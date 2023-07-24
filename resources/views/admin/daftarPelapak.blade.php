@extends('layouts.master')

@php
$count = 1;
@endphp

@section('content')
<!-- Section Start -->
@if($pelapak->count() > 0)
<div class="container mt-5 pt-5">
  <h2 class="text-center text-uppercase text-header-table-3">Data Pelapak</h2>

  <table class="table text-center mt-4">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Pelapak</th>
        <th scope="col">Alamat Pelapak</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pelapak as $pelapak)
      <tr>
        <th scope="row">{{$count}}</th>
        @php
        $count++;
        @endphp
        <td>{{$pelapak->nama}}</td>
        <td>{{$pelapak->alamat}}</td>
        <td>
          <div class="d-inline-block d-flex justify-content-center align-items-center">
            <button class="btn btn-primary mx-1" onclick="window.location='{{route('admin.editPelapak', ['id'=>$pelapak->id])}}'">Edit</button>
            <x-form method="DELETE" action="{{ route('admin.deletePelapak', ['id'=>$pelapak->id]) }}">
              <button class="btn btn-danger mx-1">Hapus</button>
            </x-form>
            <button class="btn btn-success mx-1" onclick="window.location='{{route('admin.pelapakBaru')}}'">Tambah</button>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <div class="d-flex align-items-center text-center" style="height: 80vh;">
    <h3 class="mx-auto">Belum Ada Pelapak</h3>
  </div>
  @endif
</div>
@endsection