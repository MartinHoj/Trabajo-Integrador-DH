<link rel="stylesheet" href="css/styleFormEditData.css">
@extends('layouts.form')
@section('title','Change Password')
@section('action','/updateResetPassword')
@section('card-header','Change your password')
@section('form')

<div class="form-group row">
    <label for="newPassword" class="col-md-4 col-form-label text-md-right">New Password</label>
    
    <div class="col-md-6">
        <input id="password" type="password" placeholder="Write a new password here" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" required autocomplete="new-password">
        

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
        <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" placeholder="Confirm your new password" required autocomplete="new-password">
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