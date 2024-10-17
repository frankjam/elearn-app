@extends('Layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Roles</h5>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create Role</a>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th width="40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>

                                        <form action="{{ route('roles.destroy',$role->id) }}" method="Post">

                                            <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-warning">
                                                Add / Edit Role Permission
                                            </a>
                                            @can('update-role')
                                            <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-success">Edit</a>
                                            @endcan

                                            @can('delete-role')
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-2">Delete</button>
                                            @endcan
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </section>

</div><!-- End #main -->

@endsection
