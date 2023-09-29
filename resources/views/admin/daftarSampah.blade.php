@extends('layouts.master')
@php
    $count = 1;
    $kodeKategori = 1;
    $jenisArr = [];
    
    foreach ($dataSampahByJenis as $jenis => $items) {
        array_push($jenisArr, $jenis);
    }
    
    $activeCount = sizeof($jenisArr);
@endphp

@section('content')
    <div class="container-fluid mt-5 pt-5">
        <div class="d-flex justify-content-center align-items-center">
            <h1>DATA SAMPAH</h1>
            <div class="dropdown pb-2 ms-2">
                <button class="btn btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false" type="button">
                    Filter
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach ($dataSampahByJenis as $jenis => $items)
                        <li><button class="dropdown-item active" id="{{ 'toggleVision' . $jenis }}"
                                type="button">{{ $jenis }}</button></li>
                    @endforeach
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <div class="form-check mx-3">
                            <input class="form-check-input" type="checkbox" value="" id="toggleVisionAll" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                Semuanya
                            </label>
                        </div>
                    </li>
                </ul>
                <button class="btn btn-success" type="submit"
                    onclick="window.location='{{ route('admin.dataSampahBaru') }}'">Tambah</button>
            </div>
        </div>
        <!-- Default dropend button -->
        <!-- Section -->
        <div class="table-responsive-sm">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Kode Kategori Sampah</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Harga Lapak</th>
                        <th scope="col">Harga Nasabah</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                @foreach ($dataSampahByJenis as $jenis => $items)
                    <tbody id="{{ $jenis }}">
                        <tr class="table-danger">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ $jenis }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $kodeKategori }}</td>
                                <td>{{ $item->kodeSampah }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>Rp {{ number_format($item->hargaLapak, 2) }}</td>
                                <td>Rp {{ number_format($item->hargaNasabah, 2) }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button class="btn btn-primary mx-1">
                                            <a href="{{ route('admin.editDataSampah', ['kodeSampah' => $item->kodeSampah]) }}"
                                                class="text-white text-decoration-none">Edit</a>
                                        </button>
                                        <x-form method="DELETE"
                                            action="{{ route('admin.deleteDataSampah', ['kodeSampah' => $item->kodeSampah]) }}">
                                            <button class="btn btn-danger mx-1" id="btn-hapus">Hapus</button>
                                        </x-form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @php
                        $kodeKategori++;
                    @endphp
                @endforeach
            </table>
        </div>
    </div>

    <script>
        var jenisArr = @json($jenisArr);
        // console.log(jenisArr);
        // var numberOfDropdowns = @json($activeCount);
        var activeCount = @json($activeCount);

        jenisArr.forEach(function(jenis) {
            var button = document.getElementById("toggleVision" + jenis);
            if (button !== null) {
                button.addEventListener("click", function(e) {
                    var element = document.getElementById(jenis);
                    if (element !== null) {
                        if (element.hidden) {
                            element.hidden = false;
                            e.target.classList.add("active");

                            activeCount++;
                            console.log(activeCount);

                            if (activeCount == @json($activeCount)) {
                                $("#toggleVisionAll").prop('checked', true);
                            }
                        } else {
                            element.hidden = true;
                            e.target.classList.remove("active");

                            activeCount--;
                            console.log(activeCount);

                            if ($("#toggleVisionAll").is(':checked')) {
                                $("#toggleVisionAll").prop('checked', false);
                            }
                        }
                    }
                });
            }
        });


        $(function() {
            $("#toggleVisionAll").click(function(event) {
                var x = $(this).is(':checked');
                if (x == true) {
                    activeCount = @json($activeCount);
                    console.log(activeCount);
                    jenisArr.forEach(function(jenis) {
                        console.log(jenis)
                        document.getElementById(jenis).hidden = false;
                        $("#toggleVision" + $.escapeSelector(jenis)).addClass("active");
                    });
                } else {
                    activeCount = 0;
                    console.log(activeCount);
                    jenisArr.forEach(function(jenis) {
                        document.getElementById(jenis).hidden = true;
                        $("#toggleVision" + $.escapeSelector(jenis)).removeClass("active");
                    });
                }
            });
        });
    </script>
@endsection
