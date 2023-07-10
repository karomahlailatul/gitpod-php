@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1>Create Course Section Q&A</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.course-section-qnas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" name="question" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="answer" class="form-label">Answer</label>
                <input type="text" name="answer" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="course_sections_id" class="form-label">Course Section</label>
                <select name="course_sections_id" class="form-control" required>
                    @foreach ($courseSections as $courseSection)
                        <option value="{{ $courseSection->id }}">{{ $courseSection->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
