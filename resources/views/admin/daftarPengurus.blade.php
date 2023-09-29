@extends('layouts.master')

@section('content')
  <!-- Section Start -->
  <div class="mx-2" style="min-height: 100vh;">
  <h2 class="main-text">Data Pengurus</h2>
  <!-- <div class="card-header d-flex justify-content-end mx-5 px-4">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <div class="input-group">
          <x-form action="{{route('admin.searchPengurus')}}" class="input-group">
            <input type="search" name="param" class="form-control rounded mx-3" placeholder="Cari pengurus..." aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-outline-primary">Filter</button>
            <button type="button" class="btn btn-outline-primary" onclick="window.location='{{route('admin.pengurusBaru')}}'">Tambah</button>
          </x-form>
        </div>
      </li>
    </ul>
  </div> -->

  <div class="table-wrapper-section">
    <table class="fl-table" id="dataTable">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Pengurus</th>
          <th>Nama Pengurus</th>
          <th>Jabatan</th>
          <th>Alamat</th>
          <th>No Telepon</th>
          <th>Aksi</th>
          <!-- <th></th>   -->
        </tr>
      </thead>
      <tbody>
        @php
          $count = 1;
        @endphp
        @if($pengurus->count() > 0)
          @foreach($pengurus as $pengurus)
          <tr>
            <td>{{ $count++ }}</td>
            <td>P{{ str_pad($pengurus->id, 6, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $pengurus->name }}</td>
            <td>{{ $pengurus->jabatan }}</td>
            <td>{{ $pengurus->alamat }}</td>
            <td>{{ $pengurus->no_telp }}</td>
            <td>
              <div class="d-flex justify-content-center">
                <button class="btn btn-primary rounded-pill"><a href="{{ route('admin.editPengurus', ['id'=>$pengurus->id]) }}" class="text-white text-decoration-none">Edit</a></button>
                <x-form method="DELETE" action="{{ route('admin.deletePengurus', ['id'=>$pengurus->id]) }}">
                  <button class="btn btn-danger rounded-pill" id="btn-hapus">Hapus</button>
                </x-form>
              </div>
            </td>
            <!-- <td>
              <div class="d-flex justify-content-center mt-0">
                <a href="Detail-sababah.html" class="btn btn-success rounded-pill px-5 text-decoration-none">Lihat Lebih Detail</a>
              </div>
            </td> -->
          </tr>
          @endforeach
        @else
          <tr>
            <td colspan="8">
              <div class="d-flex align-items-center text-center" style="height: 80vh;">
                <h3 class="mx-auto">Belum Ada Pengurus</h3>
              </div>
            </td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
  <!-- Section End -->

  <script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      dom: '<"top"lf<"dataTableNewElement">>t<"bottom"ip>',
      initComplete: function() {
        $('.dataTableNewElement').html(
          '@if(Auth::user()->jabatan !== 'Pengurus')<button class="btn btn-secondary tableAddButton my-1" onclick="window.location=\'{{ route("admin.pengurusBaru") }}\'">Tambah</button>@endif ');
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
@endsection