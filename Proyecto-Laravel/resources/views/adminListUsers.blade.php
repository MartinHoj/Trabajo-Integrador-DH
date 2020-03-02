<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <h1>
        Listado de usuarios
      </h1>
      <ul>
      @foreach ($users as $user)
          <li>
            {{$user->name}} {{$user->surname}} {{$user->getRole->role_name}}
          </li>
      @endforeach
    </ul>
    </div>
  </body>
</html>
