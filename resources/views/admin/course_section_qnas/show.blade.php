@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1>Course Section Q&A Details</h1>

        <p><strong>Question:</strong> {{ $courseSectionQna->question }}</p>
        <p><strong>Answer:</strong> {{ $courseSectionQna->answer }}</p>
        <p><strong>Description:</strong> {{ $courseSectionQna->description }}</p>

        <a href="{{ route('admin.course-section-qnas.edit', $courseSectionQna) }}" class="btn btn-primary">Edit</a>

        <form action="{{ route('admin.course-section-qnas.destroy', $courseSectionQna) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Q&A?')">Delete</button>
        </form>
    </div>
@endsection
