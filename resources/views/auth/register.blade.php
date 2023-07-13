@extends('layouts.master')

@section('content')    
<x-form action="{{route('register')}}">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border bg-white shadow-lg box-area">
            <h2 class="text-center d-flex justify-content-center">Sikebas</h2>
            <div class="col-md-6 d-flex rounded-4 justify-content-center align-items-center flex-column left-box"
                style="background-color: green; opacity: 95%;">
                <div class="featured-image mb-3">
                    <img src="{{asset('assets/iPhone_14_Pro_Max_-_1-removebg-preview.png')}}" class="img-fluid" style="width: 170px;"/>
                </div>
                <button type="submit" class="text-white fs-3"
                    style="font-family: 'Courier New', Courier, monospace; font-weight: 600; background-color: transparent; border: transparent;">Masuk</button>
            </div>
            <div class="col-md-6 right-box">
                <div id="bulet1"></div>
                <div class="row align-items-center mt-4">
                    <div class="mb-3 mt-5">
                        <input type="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="e-mail" required>
                        <x-error field="email" class="mt-2 text-end"/>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control form-control-lg bg-light fs-6" placeholder="Nama" required>
                        <x-error field="name" class="mt-2 text-end"/>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="no_telp" class="form-control form-control-lg bg-light fs-6" placeholder="No. Telepon" required>
                        <x-error field="no_telp" class="mt-2 text-end"/>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" placeholder="Username" required>
                        <x-error field="username" class="mt-2 text-end"/>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" required>
                        <x-error field="password" class="mt-2 text-end"/>
                    </div>
                    <div class="mb-1">
                        <input type="password" name="password_confirmation" class="form-control form-control-lg bg-light fs-6" placeholder="Confirm Password" required>
                        <x-error field="password" class="mt-2 text-end"/>
                    </div>
                    <div class="input-group mb-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="formCheck">
                            <label for="formCheck">
                                <small>Checked checkbox</small>
                            </label>
                        </div>
                    </div>
                </div>
                <div id="bulet2"></div>
            </div>
        </div>
    </div>
</x-form>    
@endsection