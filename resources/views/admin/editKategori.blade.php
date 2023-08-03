@extends('layouts.master')

@section('content')
	<h3 class="px-4">Detail Kategori</h3>
	<h3 class="px-4">Sampah</h3>
	<br>
	<x-form method="PATCH" action="{{ route('admin.patchSampah')}}"> 
		<input type="text" name="idSampah" value="{{$sampah->id}}" style="display:none;"/>
		<div class="form-row px-3">
			<div class="col-md-9 mb-3">
				<label for="kategori">Kategori Sampah</label><br>
				<input type="text" id="kategori" name="kategori" value="{{ old('kategori', $sampah->kategori) }}"><br>
			</div>
		</div>
		<button type="submit" class="btn btn-primary mx-4">Ubah Kategori</button>
	</x-form>
@endsection
