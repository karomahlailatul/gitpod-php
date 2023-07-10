


@extends('layouts.main')

@include('layouts.header')
@include('layouts.footer')

@section('title', 'Home')


@section('content')
    <div class="container">
        <h1>Edit Course</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $course->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image my-3">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $course->price }}" required>
            </div>
            <div class="form-group">
                <label for="category_courses_id">Category</label>
                <select name="category_courses_id" id="category_courses_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $course->category_courses_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-3">
                <label for="active">Active</label>
                <input type="checkbox" name="active" id="active" class="form-check-input" {{ $course->active ? 'checked' : '' }}>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
