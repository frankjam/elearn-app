<!-- 
Instructors should be able to create new courses, update existing courses, and delete courses they own. 
Additionally 
each course has to have a status which is set to 'Pending' on Creation 
and will have to go through an approval(done by a user with the 'approver' Role the status now changes to 'Approved'

-->
@extends('layout.layout')
@section('content')

<div class="container">

    <a href="{{ route('courses.create') }}" class="btn btn-md bg-info"> Create course </a>

<div class="row">
  <h3>Courses List</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($courses as $course)
      <tr>
        <td>{{ $course->name }}</td>
        <td>{{ $course->status == 0 ? 'Pending': 'Approved' }}</td>
        <td>
          <a class="btn btn-primary me-2" href="{{ route('courses.show', $course->id) }}">Show</a>
          @can('update-course')
          <a class="btn btn-primary me-2" href="{{ route('courses.edit', $course->id) }}">Edit</a>
          @endcan 
          <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>

@endsection