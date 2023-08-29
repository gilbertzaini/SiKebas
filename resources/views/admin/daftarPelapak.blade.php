@extends('layouts.master')

@php
$count = 1;
@endphp

@section('content')
<!-- Section Start -->
<div class="container mt-5 pt-5">
  <div class="d-flex align-items-center justify-content-start">
      <h2 class="text-center text-uppercase text-header-table-3">Data Pelapak</h2>
      <div>
        <button class="btn btn-success ms-3" onclick="window.location='{{route('admin.pelapakBaru')}}'">Tambah</button>
      </div>
    </div> 

  @if($pelapak->count() > 0)
  <table class="table text-center mt-4" id="dataTable">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode Pelapak</th>
        <th scope="col">Nama Pelapak</th>
        <th scope="col">Alamat</th>
        <th scope="col">No Telepon</th>
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
        <td>L{{ str_pad($pelapak->id, 6, '0', STR_PAD_LEFT) }}</td>
        <td>{{$pelapak->nama}}</td>
        <td>{{$pelapak->alamat}}</td>
        <td>{{$pelapak->no_telp}}</td>
        <td>
          <div class="d-inline-block d-flex justify-content-center align-items-center">
            <button class="btn btn-primary mx-1" onclick="window.location='{{route('admin.editPelapak', ['id'=>$pelapak->id])}}'">Edit</button>
            <x-form method="DELETE" action="{{ route('admin.deletePelapak', ['id'=>$pelapak->id]) }}">
              <button class="btn btn-danger mx-1">Hapus</button>
            </x-form>
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

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      columnDefs: [{
          targets: [2], // Index of the column you want to make searchable (0-based index)
          searchable: true
        },
        {
          targets: [0, 1, 3, 4, 5], // Index of the column you want to make searchable (0-based index)
          searchable: false
        }
      ]
    });
  });
</script>
@endsection