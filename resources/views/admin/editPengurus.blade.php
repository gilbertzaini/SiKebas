@extends('layouts.master')

@section('content')
  <!-- Section Start -->
  
  <x-form method="PATCH" action="{{route('admin.patchPengurus')}}" class="needs-validation container-fluid pt-5 mt-5" novalidate>
    <h3 class="px-3">Informasi Pengurus</h3>

    <input type="text" style="display:none" name="idPengurus" value="{{$pengurus->id}}"/>

    <div class="form-row px-3">
      <div class="col-md-9 mb-3">
        <label for="validationCustom01">Nama Lengkap</label>
        <input type="text" name="name" class="form-control" id="validationCustom01" value="{{$pengurus->name}}" placeholder="Nama Lengkap" required>
        <x-error field="name" class="mt-2 "/>
        {{-- <div class="valid-feedback">
          good!
        </div> --}}
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustom02">Nomor Telepon</label>
        <input type="text" name="telp" class="form-control" id="validationCustom02" value="{{$pengurus->no_telp}}" placeholder="Nomor Telepon" required>
        <x-error field="telp" class="mt-2 "/>
        {{-- <div class="valid-feedback">
          good!
        </div> --}}
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustom02">Alamat</label>
        <input type="text" name="alamat" class="form-control" id="validationCustom02" value="{{$pengurus->alamat}}" placeholder="Alamat" required>
        <x-error field="alamat" class="mt-2 "/>
        {{-- <div class="valid-feedback">
          good!
        </div> --}}
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustom03">e-mail</label>
        <input type="email" name="email" class="form-control" id="validationCustom03" value="{{$pengurus->email}}" placeholder="e-mail" required>
        <x-error field="email" class="mt-2 "/>
        {{-- <div class="valid-feedback">
          good!
        </div> --}}
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustomUsername">Username</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
          </div>
          <input type="text" name="username" class="form-control" id="validationCustomUsername" value="{{$pengurus->username}}" placeholder="Username" aria-describedby="inputGroupPrepend" required>
          <x-error field="username" class="mt-2 "/>
          {{-- <div class="invalid-feedback">
            Please choose a username.
          </div> --}}
        </div>
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustomUsername">Password</label>
        <div class="input-group">
          <input type="password" name="password" class="form-control" id="validationCustomUsername" placeholder="Password" aria-describedby="inputGroupPrepend">
          <x-error field="password" class="mt-2 "/>
          {{-- <div class="invalid-feedback">
            Please insert password.
          </div> --}}
        </div>
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
