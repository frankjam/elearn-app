@extends('layout.layout')
@section('content')
<div class="container">
@can('view-role')
<h3>Users List</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
   
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form method="POST" action="{{ route('role.asign', $user->id) }}" id="staff-role-form">
                    @csrf
                    <div class="row mb-3">
                        <label for="">Roles</label>
                        <select name="roles[]" class="form-control" multiple>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="save-staff-role" type="submit" class="btn btn-success">Assign Role</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endcan


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
            <td>{{ $course->status }}</td>
            <td><a href="#">View Contents</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection
