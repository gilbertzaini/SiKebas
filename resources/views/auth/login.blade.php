@extends('layouts.master')

@section('content')
<x-form action="{{route('login')}}">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border bg-white shadow-lg box-area">
            <h2 class="text-center d-flex justify-content-center">Sikebas</h2>
            <div class="col-md-6 d-flex rounded-4 justify-content-center align-items-center flex-column left-box" style="background-color: green; opacity: 95%;">
                <div class="featured-image mb-1">
                    <img src="{{asset('assets/logo.png')}}" class="img-fluid mx-auto" style="width: 200px !important; height: auto !important;" />
                </div>
                <button type="submit" class="text-white fs-3" style="font-family: 'Courier New', Courier, monospace; font-weight: 600; background-color: transparent; border: transparent;">Masuk</button>
            </div>
            <div class="col-md-6 right-box">
                <div id="bulet1"></div>
                <div class="row align-items-center mt-4">
                    <div class="mb-3 mt-5">
                        <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" value="{{old('username')}}" placeholder="Username">
                        <x-error field="username" class="mt-2 text-end" />
                    </div>
                    <div class="mb-5">
                        <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                        <x-error field="password" class="mt-2 text-end" />
                    </div>
                </div>
                <div id="bulet2"></div>
            </div>
        </div>
    </div>
</x-form>
@endsection