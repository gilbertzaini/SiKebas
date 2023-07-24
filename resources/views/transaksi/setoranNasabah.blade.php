@extends('layouts.master')

@php
$total = 0;
$count = 1;
@endphp

@section('content')
<h2 class="main-text">Setoran Nasabah</h2>
<div class="table-wrapper-section">
    <div class="row">
        <x-form class="col text-center" action="{{ route('admin.setoranNasabahId') }}">
            <label for="idNasabah" class="form-label second-text">Nama Nasabah</label>
            <div class="d-flex justify-content-around align-items-center col-8 mx-auto">
                <select class="form-select third-text w-75" id="idNasabah" name="idNasabah">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if ($user->id === $target->id) selected @endif>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Pilih</button>
            </div>
        </x-form>


        <div class="col">
            <h3 class="text-center second-text">Nama Pengurus</h3>
            <h5 class="text-center third-text">Ipul</h5>
        </div>
    </div>
    @if($target->setoranNasabah != NULL)
    <table class="fl-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Waktu Transaksi</th>
                <th>Kode Transaksi</th>
                <th>Kode Sampah</th>
                <th>Nama Sampah</th>
                <th>Harga Nasabah</th>
                <th>Berat (KG)</th>
                <th>Sub-Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($target->setoranNasabah as $setoran)
            <tr>
                <td>{{$count++}}</td>
                <td>{{$setoran->created_at}}</td>
                <td>{{$setoran->id}}</td>
                <td>{{$setoran->sampah->id}}</td>
                <td>{{$setoran->sampah->nama}}</td>
                <td>Rp {{$setoran->hargaNasabah}}</td>
                <td>{{$setoran->berat}}</td>
                <td>Rp {{$setoran->subtotal}}</td>
            </tr>
            @endforeach
            <tr style="border: solid black 1px;">
                <td></td>
                <td><strong>Total</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border: 1px black solid;"><strong>Rp 1,750,000.00</strong></td>
            </tr>
        <tbody>
    </table>
    @else
    <div class="d-flex align-items-center text-center" style="height: 80vh;">
        <h3 class="mx-auto">Belum Ada Setoran</h3>
    </div>
    @endif
</div>
@endsection