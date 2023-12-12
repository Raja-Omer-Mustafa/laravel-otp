<!-- home.blade.php -->

@extends('layout.main')

@section('title', 'Home Page')

@section('content')

    <div class="row d-flex justify-content-center mt-5 pt-5">
        <div class="col-md-6 border border-2 p-3 rounded ">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="text-center fs-4 fw-bold bg-primary p-2 mb-2 mb-2">Successfull !</h1>
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" ><p class="btn btn-danger">Logout</p></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
