<!-- home.blade.php -->

@extends('layout.main')

@section('title', 'Home Page')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6 border border-2 p-3 rounded ">
            @if (session()->has('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif
            <h1 class="text-center fs-4 fw-bold bg-primary p-2 mb-2">Login</h1>
            <form method="post" action="{{ route('userlogin') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
