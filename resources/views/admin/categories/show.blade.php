@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1 >Category Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $category->id }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Name: {{ $category->name }}</h6>
            </div>
        </div>
    </div>
@endsection
