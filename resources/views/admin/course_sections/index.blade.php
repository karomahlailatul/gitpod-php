@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1>Course Sections</h1>

        <a href="{{ route('admin.course-sections.create') }}" class="btn btn-primary">Create Course Section</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courseSections as $courseSection)
                    <tr>
                        <td>{{ $courseSection->id }}</td>
                        <td>{{ $courseSection->name }}</td>
                        <td>{{ $courseSection->description }}</td>
                        <td>{{ $courseSection->course->name }}</td>
                        <td>
                            <a href="{{ route('admin.course-sections.show', $courseSection) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('admin.course-sections.edit', $courseSection) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.course-sections.destroy', $courseSection) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course section?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
