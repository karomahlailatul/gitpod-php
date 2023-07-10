@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')


@section('content')
    <div class="container">
        <h1>Courses</h1>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Create Course</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->price }}</td>
                        <td>
                            <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
