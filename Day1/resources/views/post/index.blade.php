@extends('layouts.app')

@section('content')


<div class="container">
    <div class="text-center">
        <button type="button" class="mt-4 btn btn-dark">Create Post</button>
    </div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['posted_by']}}</td>
                <td>{{$post['created_at']}}</td>
                <td>
                    <a href="{{route('posts.show' , $post['id'])}}" class="btn btn-dark">View</a>
                    {{-- <a href="{{route('posts.update')}}" class="btn btn-dark">Edit</a> --}}
                    {{-- <a href="{{route('posts.delete')}}" class="btn btn-danger">Delete</a> --}}
                </td>
            </tr>
        @endforeach



        </tbody>
    </table>

</div>

@endsection