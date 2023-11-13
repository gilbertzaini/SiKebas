@extends('layouts.master')

@section('content')
    <x-form action="{{ route('login') }}">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row border bg-white shadow-lg box-area" style="border-radius: 12pt">
                {{-- <h2 class="text-center justify-content-center my-2">Sikebas</h2> --}}

                <div style="d-flex flex-column justify-content-center align-items-center d-none d-lg-block nav-text">
                    <h1 class="mt-2 text-center" style="font-weight: bold; font-size: 1.5rem !important">SIKEBAS Pamulang 25</h1>
                    <h1 class="text-center" style="font-size: 1rem !important">(Sistem Informasi Keuangan Bank Sampah Pamulang 25)</h1>
                </div>
                <div class="col-md-6 d-flex rounded-4 justify-content-center align-items-center flex-column left-box"
                    style="background-color: green; opacity: 95%;">
                    <div class="featured-image mb-1 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/logo.png') }}" class="img-fluid mx-auto my-auto py-auto"
                            style="width: 200px !important; height: auto !important;" />
                    </div>
                </div>
                <div class="col-md-6 right-box">
                    <div id="bulet1"></div>
                    <div class="row align-items-center mt-4">
                        <div class="mb-3 mt-5">
                            <input type="text" name="username" class="form-control form-control-lg bg-light fs-6"
                                value="{{ old('username') }}" placeholder="Username">
                            <x-error field="username" class="mt-2 text-end" />
                        </div>
                        <div class="mb-2">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password">
                            <x-error field="password" class="mt-2 text-end" />
                        </div>
                        <div class="d-flex justify-content-center mb-5">
                            <button type="submit" class="btn btn-success d-flex mt-2">
                                <p class="py-auto my-auto" style="font-family: Calibri Light">Masuk</p>
                            </button>
                        </div>
                    </div>
                    <div id="bulet2"></div>
                </div>
            </div>
        </div>
    </x-form>
@endsection
