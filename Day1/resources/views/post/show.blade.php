@extends('layouts.app')

@section('content')

<div class="container mt-5">
    
    <div class="card" style="width: 50%">
        <div class="card-header fw-bold">
            Post info
        </div>
        <div class="card-body  d-flex flex-column gap-1">
            <h5 class="card-title">
                <h5 class="fw-bold">Title :  </h5> 
                <span> Special title treatment</span> 
            </h5>
            
            <h5 class="card-title">
                <h5 class="fw-bold">Description :  </h5> 
                <span> With supporting text below as a natural lead-in to additional content</span> 
            </h5>
        </div>
    </div>

    <div class="card mt-5" style="width: 50%">
        <div class="card-header fw-bold">
            Post create info
        </div>
        <div class="card-body  d-flex flex-column gap-1">
            <div class="d-flex gap-2">
                <h6 class="card-title fw-bold">Name: </h6>
                <span>{{$post['posted_by']}}</span>
            </div>
            <div class="d-flex gap-2">
                <h6 class="card-title fw-bold">Email: </h6>
                <span>{{$post['email']}}</span>
            </div>
            <div class="d-flex gap-2">
                <h6 class="card-title fw-bold">Created At: </h6>
                <span>{{$post['created_at']}}</span>
            </div>
        </div>
    </div>

</div>

@endsection