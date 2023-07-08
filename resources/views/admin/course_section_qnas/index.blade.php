@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')
@section('content')
    <div class="container">
        <h1>Course Section Q&As</h1>
        <a href="{{ route('admin.course-section-qnas.create') }}" class="btn btn-primary">Create New Q&A</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

       
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courseSectionQnas as $courseSectionQna)
                    <tr>
                        <td>{{ $courseSectionQna->id }}</td>
                        <td>{{ $courseSectionQna->question }}</td>
                        <td>{{ $courseSectionQna->answer }}</td>
                        <td>{{ $courseSectionQna->description }}</td>
                        <td>
                            <a href="{{ route('admin.course-section-qnas.show', $courseSectionQna) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('admin.course-section-qnas.edit', $courseSectionQna) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.course-section-qnas.destroy', $courseSectionQna) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Q&A?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
