@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1 >Course Section Part Details</h1>
        <p><strong>Name:</strong> {{ $courseSectionPart->name }}</p>
        <p><strong>Description:</strong> {{ $courseSectionPart->description }}</p>
        <p><strong>Course Section:</strong> {{ $courseSectionPart->courseSection->name }}</p>
        <a href="{{ route('admin.course-section-parts.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
