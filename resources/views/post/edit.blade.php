@extends('layouts.app')

@section('content')
        {{-- @dd($post)     --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="container mt-5 col-5" action="{{route('posts.update', $post->id)}}" method="POST">
    @csrf
    @method('put')
        <div class="row mb-3">
            <label for="colFormLabel"  class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" value="{{$post->title}}"  class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" name="description" value="{{$post->description}}" class="form-control" id="colFormLabel">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea column =10  name="content" value="{{$post->Content}}" class="form-control" id="colFormLabel"></textarea>
            </div>
        </div>
        <div class="col-7 mb-3">
            <label for="formFileReadonly" class="form-label fw-bold">Upload image</label>
                <input class="form-control"  name="file" type="file" id="formFileReadonly">
        </div>
        <button type="submit" class="btn-dark btn"> Edit Post </button>
    </form>

@endsection
