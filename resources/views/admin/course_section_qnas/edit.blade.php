@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1>Edit Course Section Q&A</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.course-section-qnas.update', $courseSectionQna) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" name="question" class="form-control" value="{{ $courseSectionQna->question }}" required>
            </div>

            <div class="mb-3">
                <label for="answer" class="form-label">Answer</label>
                <input type="text" name="answer" class="form-control" value="{{ $courseSectionQna->answer }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" required>{{ $courseSectionQna->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="course_sections_id" class="form-label">Course Section</label>
                <select name="course_sections_id" class="form-control" required>
                    <!-- Render the options for the course sections here -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
