@extends('layouts.master')

@section('content')
<!-- Section Start -->
<div class="mx-2">
  <h2 class="main-text">Data Kategori Sampah</h2>

  <div class="table-wrapper-section">
    <table class="fl-table" id="dataTable">
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

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      dom: '<"top"lf<"dataTableNewElement">>t<"bottom"ip>',
      initComplete: function() {
        $('.dataTableNewElement').html(
          '<button class="btn btn-secondary tableAddButton my-1" onclick="window.location=\'{{ route("admin.sampahBaru") }}\'">Tambah</button>');
        },
      columnDefs: [{
          targets: [2], // Index of the column you want to make searchable (0-based index)
          searchable: true
        },
        {
          targets: [0, 1, 3], // Index of the column you want to make searchable (0-based index)
          searchable: false
        }
      ]
    });
  });
</script>
<!-- Section End -->
@endsection