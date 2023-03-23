@extends('layouts.app')

@section('content')



<div class="container">
    <div class="text-center">
        <a  href="{{route('posts.create')}}"  class="mt-4 btn btn-dark">Create Post</a>
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
                <td id="id" data-message="{{ $post->id }}">{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->updated_at->format('d/m/Y')}}</td>
                <td class="d-flex gap-2">
                    <a href="{{route('posts.show' , $post['id'])}}" class="btn btn-dark">View</a>
                    <a href="{{route('posts.edit' , $post['id'])}}" class="btn btn-dark">Edit</a>
                    <button id="delete-btn" type="submit" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <!--Nav Bar-->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if ($posts->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}">Previous</a></li>
            @endif

            @foreach ($posts->getUrlRange($posts->currentPage() - 2, $posts->currentPage() + 2) as $page => $url)
            <li class="page-item {{ $page == $posts->currentPage() ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endforeach

            @if ($posts->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{$posts->nextPageUrl() }}">Next</a></li>
            @else
            <li class="page-item disabled"><span class="page-link">Next</span></li>
            @endif
        </ul>
    </nav>

</div>
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('/js/confirmDelete.js') }}"></script>
@endpush
