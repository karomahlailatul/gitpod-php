@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1>Course Section Details</h1>
        <p><strong>Name:</strong> {{ $courseSection->name }}</p>
        <p><strong>Description:</strong> {{ $courseSection->description }}</p>
        <p><strong>Course:</strong> {{ $courseSection->course->name }}</p>
        <a href="{{ route('admin.course-sections.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection
