@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Admin Dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="card-title">Admin Dashboard</h2>
                    </div>
                    <div class="card-body">
                        <p>Welcome, {{ Auth::user()->name }}!</p>
                        <p>This is your admin dashboard content.</p>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
