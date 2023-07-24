@extends('layouts.master')

@section('content')
<div class="container-fluid mt-5 pt-5">
    <div class="d-flex justify-content-center align-items-center">
        <h1>DATA SAMPAH</h1>
        <div class="dropdown pb-2 ms-2">
            <button class="btn btn-primary dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" type="button">
                Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><button class="dropdown-item" id="toogleVissionMetal" type="button">Metal</button></li>
                <li><button class="dropdown-item" id="toogleVissionPlastik" type="button">Plastik</button></li>
                <li><button class="dropdown-item" id="toogleVissionKertas" type="button">Kertas</button></li>
                <li><button class="dropdown-item" id="toogleVissionBeling" type="button">Beling / kaca</button></li>
                <li><button class="dropdown-item" id="toogleVissionAkrilik">Akrilik</button></li>
                <li><button class="dropdown-item" id="toogleVissionFiber">Fiber</button></li>
                <li><button class="dropdown-item" id="toogleVissionElectronik">Electronik</button></li>
            </ul>
        </div>
    </div>
    <!-- Default dropend button -->
    <!-- Section -->
    <div class="table-responsive-sm" id="metal" style="display:none ;">
        <table class="table table-sm">
            <caption class="text-center">List Barang Jenis <strong>Metal</strong></caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">H.Lapak</th>
                    <th scope="col">JML</th>
                    <th scope="col">Rp</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-danger">
                    <th scope="row">1</th>
                    <td>1</td>
                    <td colspan="4">Metal</td>
                </tr>
                @foreach($metal as $metal)
                <tr>
                    <td>{{ $metal->kodeSampah }}</td>
                    <td>{{ $metal->nama }}</td>
                    <td>Rp {{ number_format($metal->hargaLapak, 2) }}</td>
                    <td>{{ $metal->jumlah }}</td>
                    <td>Rp {{ number_format($metal->hargaLapak * $metal->jumlah, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-responsive-sm" id="plastik" style="display:none ;">
        <table class="table table-sm">
            <caption class="text-center">List Barang Jenis <strong>Plastik</strong></caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">H.Lapak</th>
                    <th scope="col">JML</th>
                    <th scope="col">Rp</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-warning">
                    <th scope="row">1</th>
                    <td>2</td>
                    <td colspan="4">Plastik</td>
                </tr>
                @foreach($plastik as $plastik)
                <tr>
                    <td>{{ $plastik->kodeSampah }}</td>
                    <td>{{ $plastik->nama }}</td>
                    <td>Rp {{ number_format($plastik->hargaLapak, 2) }}</td>
                    <td>{{ $plastik->jumlah }}</td>
                    <td>Rp {{ number_format($plastik->hargaLapak * $plastik->jumlah, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-responsive-sm" id="Kertas" style="display: none;">
        <table class="table table-sm">
            <caption class="text-center">List Barang Jenis <strong>Kertas&nbsp;</strong>
            </caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">H.Lapak</th>
                    <th scope="col">JML</th>
                    <th scope="col">Rp</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-warning">
                    <th scope="row">1</th>
                    <td>3</td>
                    <td colspan="4">Kertas</td>
                </tr>
                @foreach($kertas as $kertas)
                <tr>
                    <td>{{ $kertas->kodeSampah }}</td>
                    <td>{{ $kertas->nama }}</td>
                    <td>Rp {{ number_format($kertas->hargaLapak, 2) }}</td>
                    <td>{{ $kertas->jumlah }}</td>
                    <td>Rp {{ number_format($kertas->hargaLapak * $kertas->jumlah, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-responsive-sm" id="Beling" style="display: none;">
        <table class="table table-sm">
            <caption class="text-center">List Barang Jenis <strong>Beling/Kaca</strong></caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">H.Lapak</th>
                    <th scope="col">JML</th>
                    <th scope="col">Rp</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-danger">
                    <th scope="row">1</th>
                    <td>4</td>
                    <td colspan="4">Beling/Kaca</td>
                </tr>
                @foreach($beling as $beling)
                <tr>
                    <td>{{ $beling->kodeSampah }}</td>
                    <td>{{ $beling->nama }}</td>
                    <td>Rp {{ number_format($beling->hargaLapak, 2) }}</td>
                    <td>{{ $beling->jumlah }}</td>
                    <td>Rp {{ number_format($beling->hargaLapak * $beling->jumlah, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="table-responsive-sm" id="Akrilik" style="display: none;">
        <table class="table table-sm">
            <caption class="text-center">List Barang Jenis <strong>Akrilik</strong></caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">H.Lapak</th>
                    <th scope="col">JML</th>
                    <th scope="col">Rp</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-warning">
                    <th scope="row">1</th>
                    <td>5</td>
                    <td colspan="4">Akrilik</td>
                </tr>
                @foreach($akrilik as $akrilik)
                <tr>
                    <td>{{ $akrilik->kodeSampah }}</td>
                    <td>{{ $akrilik->nama }}</td>
                    <td>Rp {{ number_format($akrilik->hargaLapak, 2) }}</td>
                    <td>{{ $akrilik->jumlah }}</td>
                    <td>Rp {{ number_format($akrilik->hargaLapak * $akrilik->jumlah, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-responsive-sm" id="Fiber" style="display: none;">
        <table class="table table-sm">
            <caption class="text-center">List Barang Jenis <strong>Fiber</strong></caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">H.Lapak</th>
                    <th scope="col">JML</th>
                    <th scope="col">Rp</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-warning">
                    <th scope="row">1</th>
                    <td>6</td>
                    <td colspan="4">Fiber</td>
                </tr>
                @foreach($fiber as $fiber)
                <tr>
                    <td>{{ $fiber->kodeSampah }}</td>
                    <td>{{ $fiber->nama }}</td>
                    <td>Rp {{ number_format($fiber->hargaLapak, 2) }}</td>
                    <td>{{ $fiber->jumlah }}</td>
                    <td>Rp {{ number_format($fiber->hargaLapak * $fiber->jumlah, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-responsive-sm" id="Electronik" style="display: none;">
        <table class="table table-sm">
            <caption class="text-center">List Barang Jenis <strong>Elektronik</strong></caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">H.Lapak</th>
                    <th scope="col">JML</th>
                    <th scope="col">Rp</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-warning">
                    <th scope="row">1</th>
                    <td>7</td>
                    <td colspan="4">Elektronik</td>
                </tr>
                @foreach($elektronik as $elektronik)
                <tr>
                    <td>{{ $elektronik->kodeSampah }}</td>
                    <td>{{ $elektronik->nama }}</td>
                    <td>Rp {{ number_format($elektronik->hargaLapak, 2) }}</td>
                    <td>{{ $elektronik->jumlah }}</td>
                    <td>Rp {{ number_format($elektronik->hargaLapak * $elektronik->jumlah, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Metal
        document.getElementById("toogleVissionMetal").addEventListener("click", function(button) {
            if (document.getElementById("metal").style.display === "none") {
                document.getElementById("metal").style.display = "block";
                document.getElementById("toogleVissionMetal").classList.add("active");
            } else {
                document.getElementById("metal").style.display = "none";
                document.getElementById("toogleVissionMetal").classList.remove("active");
            }
        });

        //  Plastik
        document.getElementById("toogleVissionPlastik").addEventListener("click", function(button) {
            if (document.getElementById("plastik").style.display === "none") {
                document.getElementById("plastik").style.display = "block";
                document.getElementById("toogleVissionPlastik").classList.add("active");
            } else {
                document.getElementById("plastik").style.display = "none";
                document.getElementById("toogleVissionPlastik").classList.remove("active");
            }
        });
        //  Kertas
        document.getElementById("toogleVissionKertas").addEventListener("click", function(button) {
            if (document.getElementById("Kertas").style.display === "none") {
                document.getElementById("Kertas").style.display = "block";
                document.getElementById("toogleVissionKertas").classList.add("active");
            } else {
                document.getElementById("Kertas").style.display = "none";
                document.getElementById("toogleVissionKertas").classList.remove("active");
            }
        });
        //  Beling
        document.getElementById("toogleVissionBeling").addEventListener("click", function(button) {
            if (document.getElementById("Beling").style.display === "none") {
                document.getElementById("Beling").style.display = "block";
                document.getElementById("toogleVissionBeling").classList.add("active");
            } else {
                document.getElementById("Beling").style.display = "none";
                document.getElementById("toogleVissionBeling").classList.remove("active");
            }
        });
        //  Plastik
        document.getElementById("toogleVissionPlastik").addEventListener("click", function(button) {
            if (document.getElementById("Plastik").style.display === "none") {
                document.getElementById("Plastik").style.display = "block";
                document.getElementById("toogleVissionPlastik").classList.add("active");
            } else {
                document.getElementById("Plastik").style.display = "none";
                document.getElementById("toogleVissionPlastik").classList.remove("active");
            }
        });
        //  Akrilik
        document.getElementById("toogleVissionAkrilik").addEventListener("click", function(button) {
            if (document.getElementById("Akrilik").style.display === "none") {
                document.getElementById("Akrilik").style.display = "block";
                document.getElementById("toogleVissionAkrilik").classList.add("active");
            } else {
                document.getElementById("Akrilik").style.display = "none";
                document.getElementById("toogleVissionAkrilik").classList.remove("active");
            }
        });
        //  Fiber
        document.getElementById("toogleVissionFiber").addEventListener("click", function(button) {
            if (document.getElementById("Fiber").style.display === "none") {
                document.getElementById("Fiber").style.display = "block";
                document.getElementById("toogleVissionFiber").classList.add("active");
            } else {
                document.getElementById("Fiber").style.display = "none";
                document.getElementById("toogleVissionFiber").classList.remove("active");
            }
        });
        //  Fiber
        document.getElementById("toogleVissionElectronik").addEventListener("click", function(button) {
            if (document.getElementById("Electronik").style.display === "none") {
                document.getElementById("Electronik").style.display = "block";
                document.getElementById("toogleVissionElectronik").classList.add("active");
            } else {
                document.getElementById("Electronik").style.display = "none";
                document.getElementById("toogleVissionElectronik").classList.remove("active");
            }
        });
    </script>
    @endsection