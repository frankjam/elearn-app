@extends('Layout.layout')

@section('content')

<div class="content-wrapper">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Roles and Permissions </h5>
                        <div class="pull-right mb-2">
                            <h4>Role : {{ $role->name }}
                                <a href="{{ url('roles') }}" class="btn btn-danger float-end">Back</a>
                            </h4>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                @error('permission')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="">Permissions</label>

                                <div class="row">
                                    @foreach ($permissions as $permission)
                                    <div class="col-md-2">
                                        <label>
                                            <input type="checkbox" name="permission[]" value="{{ $permission->name }}" {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }} />
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>

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
