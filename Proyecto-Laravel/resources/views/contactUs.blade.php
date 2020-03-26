@extends('layouts.form')
@section('header')
@if (session('log'))
@include('layouts.header')
@else
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="btn btn-primary" href="/" role="button">Go Back</a>
    </nav>
</header>



@endif
@endsection
@section('title','Contact Us')
@section('action','/contactUs')

@section('card-header')
<h1>Contact us</h1>
    Contact with us if you have any problem or just for give us a recomendation. We want to know your opinions
@endsection
@section('form')


<div class="form-group ">
    <label for="email" class="">{{ __('E-Mail Address') }}</label>
    <div class="">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ @old('email') }}" required autocomplete="email">
        
    <small class="text-muted">This email is for us to contact you, it won't be share with anybody else</small>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="title">Tell us the problem you had</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Tell us the problem you had" required value={{@old('title')}}>
  </div>
  <div class="form-group">
    <label for="comments">Comments</label>
    <textarea class="form-control" name="comments" id="comments" rows="3" placeholder="Comments" value={{@old('comments')}}></textarea>
  </div>
  <div class="form-group">
          <br>
          <button class="btn btn-primary" type="submit">Send</button>
        </div>
@endsection