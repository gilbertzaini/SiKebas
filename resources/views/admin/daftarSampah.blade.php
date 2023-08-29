@extends('layouts.master')
@php
$count = 1;
$kodeKategori = 1;
$jenisArr = array();

foreach($dataSampahByJenis as $jenis => $items){
array_push($jenisArr, $jenis);
}
@endphp

@section('content')
<div class="container-fluid mt-5 pt-5">
    <div class="d-flex justify-content-center align-items-center">
        <h1>DATA SAMPAH</h1>
        <div class="dropdown pb-2 ms-2">
            <button class="btn btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" type="button">
                Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach($dataSampahByJenis as $jenis => $items)
                <li><button class="dropdown-item" id="{{'toggleVision'.$jenis}}" type="button">{{$jenis}}</button></li>
                @endforeach<li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="toggleVisionAll">
                        <label class="form-check-label" for="flexCheckDefault">
                            Semuanya
                        </label>
                    </div>
                </li>
            </ul>            
        <button class="btn btn-success" type="submit" onclick="window.location='{{route('admin.dataSampahBaru')}}'">Tambah</button>
        </div>
    </div>
    <!-- Default dropend button -->
    <!-- Section -->
    @foreach($dataSampahByJenis as $jenis => $items)
    <div class="table-responsive-sm" id="{{$jenis}}" style="display: none;">
        <table class="table table-sm">
            <caption class="text-center">List Barang Jenis <strong>{{$jenis}}</strong></caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Kategori Sampah</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Harga Lapak</th>
                    <th scope="col">Harga Nasabah</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-danger">
                    <th scope="row">1</th>
                    <td>{{$kodeKategori}}</td>
                    <td></td>
                    <td colspan="4">{{$jenis}}</td>
                </tr>
                @foreach($items as $item)
                <tr>
                    <td>{{ ++$count }}</td>
                    <td>{{ $kodeKategori}}</td>
                    <td>{{ $item->kodeSampah }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>Rp {{ number_format($item->hargaLapak, 2) }}</td>
                    <td>Rp {{ number_format($item->hargaNasabah, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @php
    $count = 1;
    $kodeKategori++;
    @endphp
    @endforeach
</div>

<script>
    var jenisArr = @json($jenisArr);
    // console.log(jenisArr);

    jenisArr.forEach(function(jenis) {
        var button = document.getElementById("toggleVision" + jenis);
        if (button !== null) {
            button.addEventListener("click", function(e) {
                var element = document.getElementById(jenis);
                if (element !== null) {
                    if (element.style.display === "none") {
                        element.style.display = "block";
                        e.target.classList.add("active");
                    } else {
                        element.style.display = "none";
                        e.target.classList.remove("active");
                    }
                }
            });
        }
    });

    $(function() {
        $("#toggleVisionAll").click(function(event) {
            // console.log('clicked');
            var x = $(this).is(':checked');
            if (x == true) {
                $(".table-responsive-sm").show();
                $(".dropdown-item").removeClass("active");
            } else {
                $(".table-responsive-sm").hide();
            }
        });
    });
</script>


@endsection