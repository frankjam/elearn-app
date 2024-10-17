@extends('Layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Roles </h5>
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create Role</a>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        <form action="{{ url('roles/'.$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="">Role Name</label>
                                <input type="text" name="name" value="{{ $role->name }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</div><!-- End #main -->

@endsection
