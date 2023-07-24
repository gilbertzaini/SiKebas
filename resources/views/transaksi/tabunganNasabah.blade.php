@extends('layouts.master')
@section('content')
  <h2 class="main-text">Tabungan Nasabah</h2>
<div class="table-wrapper-section">
    <table class="fl-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Debet Nasabah</th>
            <th>Kredit Nasabah</th>
            <th>Saldo</th>
            <th>Keterangan</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>29-09-22</td>
            <td>6.650</td>
            <td>-</td>
            <td>108.645</td>
            <td>Penarikan</td>
        </tr>
        <tbody>
    </table>
</div>
@endsection