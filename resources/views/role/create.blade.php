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
                                <a href="{{ url('roles') }}" class="btn btn-danger float-end">Back</a>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <form action="{{ url('roles') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="">Role Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

                                        </div><!-- End #main -->

@endsection
