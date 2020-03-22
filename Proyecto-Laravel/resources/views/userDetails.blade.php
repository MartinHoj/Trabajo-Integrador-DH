<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>{{$user->username}}</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/imageSize.css">
</head>
<body>
  @include('layouts.header')
  <h1 class="text-center title display-2">
    {{$user->name}} {{$user->surname}}
  </h1>
  <div class="container align-center main">
    <div class="card align-center col-8">
    <div class="card-body h2 text-center">User Information</div>
    <div class="img-container container">
      <img src="/images/avatars/{{$user->avatar_name}}" class="circular img" alt="No Disponible">
    </div>
    @if (!session('guest'))
    <a href="/formEditAvatar" class="stretched-link text-center">Change Avatar</a>    
    @endif
    <div class="card-body">Name: {{$user->name}}</div>
    <div class="card-body">Surname: {{$user->surname}}</div>
    <div class="card-body">Username: {{$user->username}}</div>
    <div class="card-body">Email: {{$user->email}}</div>
    <div class="card-body">Phone: {{$user->phone}}</div>
    <div class="card-body">Hobbie: {{$user->hobbie}}</div>
    <div class="card-body">Country: {{$user->country}}</div>
      <div class="card-title text-center title h5">Friends:</div>
      @foreach ($friends as $friend)
          <div class="card-body">{{$friend->username}}</div>
      @endforeach    
    {{-- {{dd($friends)}} --}}
    </div>
  </div>

  
  
  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>
