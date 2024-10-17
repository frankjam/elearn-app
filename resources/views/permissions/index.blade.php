@extends('Layout.layout')

@section('content')

<div class="content-wrapper">



        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Permissions</h5>
                            <div class="pull-right mb-2">
                                <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create Permissions</a>
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
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <form action="{{ route('permissions.destroy',$permission->id) }}" method="Post">
                                        <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-success">Edit</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-2">Delete</button>
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
