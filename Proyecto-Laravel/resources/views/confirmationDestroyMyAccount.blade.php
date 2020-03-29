<link rel="stylesheet" href="css/styleFormEditData.css">
@extends('layouts.form')
@section('title','Close Accounting')
@section('action',' ')
@section('header')
    @include('layouts.header')
@endsection
@section('card-header','Are you shure you wanna close your account???')
@section('form')

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-2">
        <a role="button" href="/formEditData" class="btn btn-primary">
            No, I want to go back
        </a>
    </div>
</div>
<br><br>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-2">
        <a role="button" href="/destroyMyAccount" class="btn btn-danger">
            Yes, I want to destroy my account
        </a>
    </div>
</div>


@endsection