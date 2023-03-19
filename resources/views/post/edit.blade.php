@extends('layouts.app')

@section('content')

    <form class="container mt-5" action="{{route('posts.update')}}">
    @csrf
    @method('put')
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea column =10  class="form-control" id="colFormLabel"></textarea>
            </div>
        </div>
        <button type="submit" class="btn-dark btn"> Edit Post </button>
    </form>

@endsection