@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="row gap-4">
        <div class="row col-6">
            <div class="d-flex">
                <div class="card" style="width: 100%">
                    <div class="card-header fw-bold">
                        Post info
                    </div>
                    <div class="card-body  d-flex flex-column gap-1">
                        <div class="d-flex gap-2">
                            <h6 class="fw-bold">Title: </h6>
                            <span> {{$post->title}}</span>
                        </div>
                        <div class="d-flex gap-2">
                            <h6 class="fw-bold">Description: </h6>
                            <span> {{$post->description}}</span>
                        </div>
                    </div>
                </div>
            </div>



            <div class="card mt-5" style="width: 100%">
                <div class="card-header fw-bold">
                    Post create info
                </div>
                <div class="card-body  d-flex flex-column gap-1">
                    <div class="d-flex gap-2">
                        <h6 class="card-title fw-bold">Name: </h6>
                        <span>{{$post->user->name}}</span>
                    </div>
                    <div class="d-flex gap-2">
                        <h6 class="card-title fw-bold">Email: </h6>
                        <span>{{$post->user->email}}</span>
                    </div>
                    <div class="d-flex gap-2">
                        <h6 class="card-title fw-bold">Created at: </h6>
                        <span>{{$post->updated_at->format('d/m/Y')}}</span>
                    </div>
                </div>
            </div>


            <div class="d-flex mt-3 gap-2">
                <form action="{{route('comments.store')}}" method="post" class="mt-5">
                    @csrf
                    <div class="mb-3 ">
                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Comment</label>
                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="2"></textarea>
                        <input class="d-none" name="post_id" value={{$post->id}}>
                    </div>
                    <button type="submit" class="btn btn-dark">Send</button>
                </form>
            </div>

            <div class="card mt-5" style="width: 100%">
                <div class="card-header fw-bold">
                    Comments
                </div>
                @foreach($comments as $comment)
                <div class="card-body  d-flex flex-column gap-1">
                    <div class="d-flex justify-content-between">
                        <span>{{$comment->message}}</span>
                        <form action={{route('comments.destroy',$comment->id)}} method="post">
                            @csrf
                            @method('delete')
                            <input class="d-none" name="post_id" value={{$post->id}}>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>

        </div>

        <div class="row col-4">
            @if($post->img_src)
            <div>
                <div class="card" style="width: 100%">
                    <div class="card-header fw-bold">
                        Post Image
                    </div>
                    <div class="card-body">
                        <img width="350vh" height="400vh" src="{{ asset('storage/' . $post->img_src) }}" alt="Uploaded Image">
                    </div>
                </div>
            </div>
            @endif
        <div>

    <div>

 </div>

@endsection
