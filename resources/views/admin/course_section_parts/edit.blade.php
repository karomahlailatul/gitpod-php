@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1 >Edit Course Section Part</h1>
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.course-section-parts.update', $courseSectionPart) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $courseSectionPart->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $courseSectionPart->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="course_sections_id" class="form-label">Course Section</label>
                <select name="course_sections_id" id="course_sections_id" class="form-control" required>
                    @foreach ($courseSections as $courseSection)
                        <option value="{{ $courseSection->id }}" {{ $courseSectionPart->course_sections_id == $courseSection->id ? 'selected' : '' }}>{{ $courseSection->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
