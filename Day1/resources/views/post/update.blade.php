@extends('layouts.app')

@section('content')

    <div class="container">
             <div class="row mb-3">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
        </div>
        </div>
        <div class="row mb-3">
        <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="colFormLabel" placeholder="col-form-label">
        </div>
        </div>
        <div class="row">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="col-form-label-lg">
        </div>
        </div>

    </div>

@endsection