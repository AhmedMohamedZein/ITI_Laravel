@extends('layouts.app')

@section('content')

<div class="container mt-5">
    
    <div class="card" style="width: 50%">
        <div class="card-header fw-bold">
            Post info
        </div>
        <div class="card-body  d-flex flex-column gap-1">
            <div class="d-flex gap-2">
                <h6 class="fw-bold">Title:  </h6> 
                <span> {{$post->title}}</span> 
            </div>
            <div class="d-flex gap-2">
                <h6 class="fw-bold">Description:  </h6> 
                <span> {{$post->description}}</span> 
            </div>
        </div>
    </div>

    <div class="card mt-5" style="width: 50%">
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

</div>

@endsection