@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="card-title">Dashboard</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Welcome, {{ Auth::user()->name }}!</p>
                        <p class="card-text">This is your dashboard content.</p>
                    </div>
                    <div class="card-footer bg-light">
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
