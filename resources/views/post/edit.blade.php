@extends('layouts.app')

@section('content')

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form class="container mt-5 col-5" action="{{route('posts.update', $id)}}" method="POST">
    @csrf
    @method('put')
        <div class="row mb-3">
            <label for="colFormLabel"  class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title"  class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" name="description" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea column =10  name="content" class="form-control" id="colFormLabel"></textarea>
            </div>
        </div>
        <button type="submit" class="btn-dark btn"> Edit Post </button>
    </form>

@endsection