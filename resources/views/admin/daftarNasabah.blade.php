@extends('layouts.master')

@section('content')
<!-- Section Start -->
<div class="mx-2">
  <h2 class="main-text">Data Nasabah</h2>

  <div class="table-wrapper-section">
    <table class="fl-table" id="dataTable">
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
          <td>N{{ str_pad($nasabah->id, 6, '0', STR_PAD_LEFT) }}</td>
          <td>{{ $nasabah->name }}</td>
          <td>{{ $nasabah->alamat }}</td>
          <td>{{ $nasabah->no_telp }}</td>
          @if($nasabah->saldo != NULL)
          <td>Rp {{ number_format($nasabah->saldo, 2, ',', '.') }}</td>
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

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      dom: '<"top"lf<"dataTableNewElement">>t<"bottom"ip>',
      initComplete: function() {
        $('.dataTableNewElement').html(
          '<button class="btn btn-secondary tableAddButton my-1" onclick="window.location=\'{{ route("admin.nasabahBaru") }}\'">Tambah</button>');
        },
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

<!-- Section End -->
@endsection