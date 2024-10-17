<!-- 
Instructors should be able to create new courses, update existing courses, and delete courses they own. 
Additionally 
each course has to have a status which is set to 'Pending' on Creation 
and will have to go through an approval(done by a user with the 'approver' Role the status now changes to 'Approved'

-->

@extends('Layout.layout')

@section('content')

<div class="content-wrapper">

    <div class="pagetitle">
        <h1>Edit Course</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col">

                <div class="card shadow-lg border-light">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Edit Course</h5>

                        @if(session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="row mb-3">
                                <div class="col-md-4 start-end">Course Name: </div>
                                <div class="col"> <input type="text" name="course_name" class="form-control"  value="{{ $course->name }}" /> </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-4 start-end">Course status: </div>
                                <div class="col">
                                  <select name="status" class="form-control">
                                    <option value="0">Pending</option>
                                    <option value="1">Aprroved</option>
                                  </select>
                                    </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                                <button type="reset" class="btn btn-secondary px-4">Reset</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

@endsection
