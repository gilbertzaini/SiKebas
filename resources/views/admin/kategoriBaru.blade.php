@extends('layouts.master')

@section('content')
	<h3 class="px-4">Detail Kategori</h3>
	<h3 class="px-4">Sampah</h3>
	<br>
	<x-form action="{{route('admin.storeSampah')}}"> 
	<div class="form-row px-3">
      <div class="col-md-9 mb-3">
		<label for="jsampah">Jenis Sampah</label><br>
			<input type="text" id="jsampah" name="jenis"><br>
		  </div>
		</div>
	<div class="form-row px-3">
      <div class="col-md-9 mb-3">
		<label for="harga">Harga/kg</label><br>
			<input type="text" id="harga" name="harga">
		  </div>
		</div>
		<button type="submit" class="btn btn-primary mx-4">Buat Kategori</button>
	</x-form>
@endsection
