@extends('layouts.master')

@section('content')
  <!-- Section Start -->
  
  <form class="needs-validation container-fluid my-3" novalidate>
    <h3 class="px-4">Informasi Calon Pengurus</h3>
    <div class="form-row px-3">
      <div class="col-md-9 mb-3">
        <label for="validationCustom01">Nama Lengkap</label>
        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
        <div class="valid-feedback">
          good!
        </div>
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustom02">Nomor Telepon</label>
        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
        <div class="valid-feedback">
          good!
        </div>
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustomUsername">Username</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
          </div>
          <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            Please choose a username.
          </div>
        </div>
      </div>
      <div class="col-md-9 mb-3">
        <label for="validationCustomUsername">Password</label>
        <div class="input-group">
          <input type="text" class="form-control" id="validationCustomUsername" placeholder="Password" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            Please insert password.
          </div>
        </div>
      </div>
    </div>
    
    <button class="btn btn-primary mx-4" type="submit">Buat Akun</button>
  </form>
  
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
