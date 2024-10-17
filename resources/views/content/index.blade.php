<!-- 
Instructors should be able to create new courses, update existing courses, and delete courses they own. 
Additionally 
each course has to have a status which is set to 'Pending' on Creation 
and will have to go through an approval(done by a user with the 'approver' Role the status now changes to 'Approved'

-->
@extends('layout.layout')
@section('content')

<div class="container">
  <div class="row">
    <a href="{{ route('courses.create') }}" class="btn btn-md"> Create course </a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($contents as $content)
      <tr>
        <td>{{ $content->name }}</td>

        <td>
          <a class="btn btn-primary me-2" href="{{ route('courses.show', $content->id ) }}">Show</a>
          <a class="btn btn-primary me-2" href="{{ route('courses.edit', $content->id) }}">Edit</a>
          <form action="{{ route('courses.destroy', $content->id) }}" method="POST" style="display:inline;">
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


@endsection