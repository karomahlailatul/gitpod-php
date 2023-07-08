@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1 >Course Section Parts</h1>
        <a href="{{ route('admin.course-section-parts.create') }}" class="btn btn-primary ">Create Course Section Part</a>
        
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
                    <th>Course Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courseSectionParts as $courseSectionPart)
                    <tr>
                        <td>{{ $courseSectionPart->id }}</td>
                        <td>{{ $courseSectionPart->name }}</td>
                        <td>{{ $courseSectionPart->description }}</td>
                        <td>{{ $courseSectionPart->courseSection->name }}</td>
                        <td>
                            <a href="{{ route('admin.course-section-parts.show', $courseSectionPart) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('admin.course-section-parts.edit', $courseSectionPart) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.course-section-parts.destroy', $courseSectionPart) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course section part?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
