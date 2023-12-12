<!-- home.blade.php -->

@extends('layout.main')

@section('title', 'Home Page')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6 border border-2 p-3 rounded ">
            <h1 class="text-center fs-4 fw-bold bg-primary p-2 mb-2">OTP Varfication</h1>
            <form method="post" action="{{ route('otpvarify') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Enter OTP</label>
                    <input type="text" name="otp" class="form-control" placeholder="Enter your otp..." id="exampleInputEmail1">
                    @error('otp')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
