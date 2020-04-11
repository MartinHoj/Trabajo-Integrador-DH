<link rel="stylesheet" href="css/styleFormEditData.css">
@extends('layouts.form')
@section('title','Change Password')
@section('action','/updatePassword')
@section('header')
    @include('layouts.header')
@endsection
@section('card-header','Here you can change your password')
@section('form')

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="newPassword" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
    
    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" required autocomplete="new-password">
        
        @error('newPassword')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="confirmPassword" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
    <div class="col-md-6">
        <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" required autocomplete="new-password">
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Make Changes') }}
        </button>
    </div>
</div>
{{-- {{dd($errors)}} --}}

@endsection