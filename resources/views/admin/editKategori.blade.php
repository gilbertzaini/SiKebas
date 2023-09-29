@extends('layouts.forms')

@section('content')
<div class="form-body">
	<div class="row">
		<div class="form-holder">
			<div class="form-content">
				<div class="form-items">
					<h3>Edit Kategori Sampah</h3>
					<p>Silahkan isi data di bawah ini.</p>
					<x-form method="PATCH" action="{{ route('admin.patchSampah')}}">

						<input type="text" name="idSampah" value="{{$sampah->id}}" style="display:none;" readonly/>
						<div class="col-md-12">
							<input type="text" id="kategori" name="kategori" value="{{ old('kategori', $sampah->kategori) }}">
							@error('kategori')
                                <div class="formAlert">{{ $message }}</div>
                            @enderror
						</div>

						<div class="form-button mt-3">
							<button type="button" class="btn btn-danger" onclick="window.location='{{route('admin.kategoriSampah')}}'">Kembali</button>
							<button type="submit" class="btn btn-primary">Tambahkan</button>
						</div>
					</x-form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection