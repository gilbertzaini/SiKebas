@extends('layouts.master')
@section('content')
  <h2 class="main-text">Laporan Arus Kas Nasabah</h2>
<div class="table-wrapper-section">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Tanggal</th>
            <th>keterangan</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>Saldo</th>
			<th>Tanggal</th>
            <th>Keterangan</th>
			<th>Debit</th>
            <th>Kredit</th>
            <th>Saldo</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>26/5/18</td>
            <td>Pindahan</td>
            <td>-</td>
            <td>-</td>
            <td>Rp 9,768,200.00</td>
            <td>15/12/18</td>
			<td>Pengembalian Tabungan (Bu Linda//Block C)</td>
			<td>-</td>
			<td>Rp 250,000.00</td>
			<td>Rp 10,018,200.00</td>
        </tr>
        <tbody>
    </table>
</div>
@endsection