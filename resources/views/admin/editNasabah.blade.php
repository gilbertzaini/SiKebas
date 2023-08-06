@extends('layouts.master')

@section('content')
  <!-- Section Start -->
  
  <x-form method="PATCH" action="{{route('admin.patchNasabah')}}" class="needs-validation container-fluid mt-5 pt-5" novalidate>
    <h3 class="px-3">Informasi Nasabah</h3>

    <input type="text" style="display:none" name="idNasabah" value="{{$nasabah->id}}"/>

    <div class="form-row px-3">
      <div class="col-md-9 mb-3">
        <label for="validationCustom01">Nama Lengkap</label>
        <input type="text" name="name" class="form-control" id="validationCustom01" value="{{$nasabah->name}}" placeholder="Nama Lengkap" required>
        <x-error field="name" class="mt-2 "/>
        {{-- <div class="valid-feedback">
          good!
        </div> --}}
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustom01">Nomor Telepon</label>
        <input type="text" name="alamat" class="form-control" id="validationCustom01" value="{{$nasabah->alamat}}" placeholder="Alamat" required>
        <x-error field="alamat" class="mt-2 "/>
        {{-- <div class="valid-feedback">
          good!
        </div> --}}
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustom02">Nomor Telepon</label>
        <input type="text" name="telp" class="form-control" id="validationCustom02" value="{{$nasabah->no_telp}}" placeholder="Nomor Telepon" required>
        <x-error field="telp" class="mt-2 "/>
        {{-- <div class="valid-feedback">
          good!
        </div> --}}
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustom02">Saldo</label>
        <input type="number" name="saldo" class="form-control" id="validationCustom02" value="@if($nasabah->saldo != NULL){{$nasabah->Saldo->saldo}}@else{{0}}@endif" placeholder="Saldo" required>
        <x-error field="saldo" class="mt-2 "/>
        {{-- <div class="valid-feedback">
          good!
        </div> --}}
      </div>
    </div>
    
    <button class="btn btn-primary mx-4" type="submit">Buat Akun</button>
  </x-form>
  
  <script>
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  </script>
  
  <!-- Section Ends -->
  
  <script src="../style/js/bootstrap.bundle.js"></script>
@endsection
