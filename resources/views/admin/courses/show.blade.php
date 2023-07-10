 @extends('layouts.main')

 @include('layouts.header')
 @include('layouts.footer')

 @section('title', 'Home')


 @section('content')
 <div class="container">
     <h1>Course Details</h1>

     <table class="table mt-3">
         <tbody>
             <tr>
                 <th>Name</th>
                 <td>{{ $course->name }}</td>
             </tr>
             <tr>
                 <th>Description</th>
                 <td>{{ $course->description }}</td>
             </tr>
             <tr>
                 <th>Image</th>
                 <td>
                     <img alt="Course Image" src="{{ asset('storage/' . $course->image) }}" width="400" height="400" style="object-fit: contain; object-position: center;">
                     <!-- {{ $course->image }} -->

                 </td>
             </tr>
             <tr>
                 <th>Price</th>
                 <td>{{ $course->price }}</td>
             </tr>
             <tr>
                 <th>Category</th>
                 <td>{{ $course->category->name }}</td>
             </tr>
             <tr>
                 <th>Active</th>
                 <td>{{ $course->active ? 'Yes' : 'No' }}</td>
             </tr>
         </tbody>
     </table>

     <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-primary">Edit</a>
     <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
     </form>
 </div>
 @endsection