@extends('layouts.master')

@section('content')
    <div class="card mx-2">
        <div class="card-header d-flex justify-content-end">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <div class="input-group">
                        <input type="search" class="form-control rounded mx-3" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary">Filter</button>
                        <button type="button" class="btn btn-outline-primary">Export</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center my-3">
        @if($transactions->count() > 0)
            <table class="table table-striped mx-auto">
                <thead class="table-dark">
                    <th>Nama Nasabah</th>
                    <th>Jenis Sampah</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Waktu Transaksi</th>            
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->User->name}}</td>
                        <td>{{$transaction->Sampah->jenis}}</td>
                        <td>{{$transaction->jumlah}}</td>
                        <td>Rp. {{ number_format($transaction->total, 0, ',', '.') }}</td>
                        <td>{{$transaction->tanggalTransaksi}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else        
            <div class="d-flex align-items-center text-center" style="height: 80vh;">
                <h3 class="mx-auto">Belum Ada Transaksi</h3>
            </div>
        @endif
    </div>
@endsection