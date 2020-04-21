@extends('layouts.form')
@section('title','Edit Avatar')
<link rel="shortcut icon" href="{{URL::asset('/icon/iconoPrincipal.jpg')}}" type="image/x-icon">
@section('header')
@include('layouts.header')
@endsection
@section('action','/updateAvatar')
@section('card-header','Choose another Avatar for your account')
@section('form')
<div class="form-group row">
    <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
    
    <div class="col-md-6">
        <input id="name" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="name" autofocus>
        
        @error('avatar')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Change my Avatar') }}
        </button>
    </div>
</div>
@endsection