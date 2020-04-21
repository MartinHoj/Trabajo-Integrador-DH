<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>{{$user->username}}</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/imageSize.css">
  <link rel="stylesheet" href="/css/styleUserDetails.css">
  <link rel="shortcut icon" href="{{URL::asset('/icon/iconoPrincipal.jpg')}}" type="image/x-icon">
</head>
<body>
  @include('layouts.header')
  <h1 class="text-center title display-2 nombreUsuario border-bottom-0 rounded-top mt-2 bg-light">
    USUARIO: {{$user->name}} {{$user->surname}}
  </h1>
  <div class="container align-center main">
    <div class="card align-center col-5 text-center">
    <div class="card-body h2 text-center pt-3">User Information</div>
    <div class="img-container container text-center">
      <img src="/storage/images/avatars/{{$user->avatar_name}}" class="circular img text-center" alt="No Disponible">
    </div>
    @if (!session('guest'))
      <a href="/formEditAvatar" class=" stretched-link text-center changeName btn btn-outline-primary">Change Avatar</a>    
    @endif
    @if (session('guest'))
        @switch($relation)
            @case(0)
                <a href="/addFriend/{{$id}}" role="button" class="btn btn-primary">Send Friend Request</a>
                @break
            @case(1)
                <button disabled="disabled" class="btn btn-primary" role="button">Ya son amigos!</button>
                <a href="/destroyFriend/{{$id}}" role="button" class="btn btn-primary">Eliminar Amigo</a>
                @break
            @case(2)
                <button disabled="disabled" class="btn btn-primary" role="button">Esperando la respuesta</button>
                <a href="/destroyFriendsRequest/{{$id}}" role="button" class="btn btn-primary">Eliminar Request</a>
                @break
                @case(3)
                <a href="/acceptFriend/{{$id}}" role="button" class="btn btn-primary">Accept Friend</a>
                <a href="/dontAcceptFriend/{{$id}}" role="button" class="btn btn-primary">Don´t Accept Friend</a>
                @break
            @default
                Error Procesando su amistad
        @endswitch
    @endif

    
    <div class="card-body pt-2">Name: {{$user->name}}</div>
    <div class="card-body">Surname: {{$user->surname}}</div>
    <div class="card-body">Username: {{$user->username}}</div>
    <div class="card-body">Email: {{$user->email}}</div>
    <div class="card-body">Phone: {{$user->phone}}</div>
    <div class="card-body">Hobbie: {{$user->hobbie}}</div>
    <div class="card-body">Country: {{$user->country}}</div>
      <div class="card-title text-center title h5" style="color: grey;">Friends:</div>
      @foreach ($friends as $friend)
          <div class="tiny-img-container">
            <img src="/storage/images/avatars/{{$friend->avatar_name}}" alt="" class="tiny-img circular">
          </div>
          <a href="/userDetails/{{$friend->user_id}}" style="color:black;" class="card-body">{{$friend->username}}</a>
      @endforeach    
    {{-- {{dd($friends)}} --}}
    </div>
  </div>

  
  
  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>
