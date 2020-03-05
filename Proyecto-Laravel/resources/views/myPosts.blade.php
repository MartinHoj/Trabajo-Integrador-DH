<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    {{session('mensaje')}}
    @foreach($posts as $post)
      {{$post->title}}
      {{$post->body}}
      <img src="/images/posts/{{$post->img_name}}" alt="">


    @endforeach
  </body>
</html>
