@extends('layout.layout')
@section('content')


<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contents as $content)
        <tr>
            <td>{{ $content->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection