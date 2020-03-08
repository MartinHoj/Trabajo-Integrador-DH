<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Contact Us</title>
</head>
<body>
    @if (session('log'))
      @include('layouts.header')
  @else
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="btn btn-primary" href="/" role="button">Volver</a>
    </nav>
    </header>
  @endif
    <main class="container">
        <form action="" method="post">
            <label for="email" class="form-controller">
                <input type="email">
            </label>
        </form>
    </main>
</body>
</html>