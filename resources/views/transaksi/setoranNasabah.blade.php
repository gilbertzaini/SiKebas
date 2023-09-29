@extends('layouts.master')

@php
    $total = 0;
    $count = 1;
@endphp

@section('content')
    <h2 class="main-text">Setoran Nasabah</h2>
    <div class="table-wrapper-section container-fluid col-11">
        <x-form class="row text-center" action="{{ route('admin.setoranNasabahId') }}">
            <div class="col-12 d-flex align-items-center">
                <div class="col-5">
                    <label for="idNasabah" class="form-label second-text">Nama Nasabah</label>
                    <div class="d-flex justify-content-around align-items-center col-8 mx-auto">
                        <select class="form-select third-text w-75" id="idNasabah" name="idNasabah">
                            @foreach ($nasabahs as $nasabah)
                                <option value="{{ $nasabah->id }}" @if ($nasabah->id == $target->id) selected @endif>
                                    {{ $nasabah->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-5">
                    <h3 class="text-center second-text">Nama Pengurus</h3>
                    <div class="d-flex justify-content-around align-items-center col-8 mx-auto">
                        <select class="form-select third-text w-75" name="idPengurus">
                            <option value="all">Semua</option>
                            @foreach ($pengurus as $pengurus)
                                <option value="{{ $pengurus->id }}" @if ($targetPengurus != null && $pengurus->id == $targetPengurus->id) selected @endif>
                                    {{ $pengurus->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-2 justify-content-between align-self-end">
                    <button type="submit" class="btn btn-primary">Pilih</button>
                    <button type="button" class="btn btn-success ms-3"
                        onclick="window.location='{{ route('admin.setoranNasabahBaru', ['id' => $target->id]) }}'">Tambah</button>
                </div>
            </div>

            <div class="col-12 d-flex">
                <div class="col-10">
                    @include('components/filterByDateInput')
                </div>
                <div class="col-2"></div>
            </div>
        </x-form>

        @if ($setoran->count() > 0)
            <table class="fl-table mt-3" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi Setoran Nasabah</th>
                        <th>Waktu Transaksi</th>
                        <th>Sub-Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($setoran as $setoran)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $setoran->kodeTransaksi }}</td>
                            <td>{{ $setoran->created_at }}</td>
                            <td>Rp {{ number_format($setoran->subtotal, 2, ',', '.') }}</td>

                            @php
                                $total += $setoran->subtotal;
                            @endphp
                        </tr>
                    @endforeach
                    <tr style="border: solid black 1px;">
                        <td style="color:transparent;">{{ $count + 1 }}</td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td style="border: 1px black solid;"><strong>Rp {{ number_format($total, 2, ',', '.') }}</strong>
                        </td>
                    </tr>
                <tbody>
            </table>
        @else
            <div class="d-flex align-items-center text-center" style="height: 55vh;">
                <h3 class="mx-auto">Belum Ada Setoran</h3>
            </div>
        @endif
    </div>

    @include('components/filterByDateScript')
    <script>
        $(document).ready(function() {
            let dataTable = $('#dataTable').DataTable({
                dom: '<"top"l>t<"bottom"ip>',
                initComplete: function() {
                    // Add event listeners to date inputs
                    $('#min, #max').on('change', function() {
                        dataTable.draw(); // Redraw the table on date range change
                    });
                }
            });
        });
    </script>

@endsection
