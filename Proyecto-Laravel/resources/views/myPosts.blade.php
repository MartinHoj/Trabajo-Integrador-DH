<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>My Posts</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/imageSize.css">
</head>
<body>
  @include('layouts.header')
  @if (session('postMessage'))
  <div class="alert alert-success" role="alert">
    {{session('postMessage')}}
  </div>
  @endif
  @foreach($posts as $post)
  <div class="container center">
  {{-- <div class="card mb-3" style="max-width: 740px;">
     <div class="row no-gutters">
      <div class="col-md-4">
        <img src="/images/posts/{{$post->img_name}}" class="card-img" alt="No Disponible">
      </div>
      <div class="col-md-8">
        <div class="card-body">
        <p class="text-right"><small class="text-right card-text"><a href="/formEditPost/{{$post->post_id}}">Change Post</a></small></p>
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->body}}</p>
          <p class="card-text"><small class="text-muted">Last updated {{$post->updated_at}}</small></p>
        </div>
      </div>
    </div> --}}
    <div class="card" style="width: 25rem;">
      <img src="/images/posts/{{$post->img_name}}" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="text-right"><small class="text-right card-text"><a href="/formEditPost/{{$post->post_id}}">Change Post</a></small></p>
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->body}}</p>
        <p class="card-text"><small class="text-muted">Last updated {{$post->updated_at}}</small></p>
        @if (!($post->updated_at === $post->created_at))
        <p class="card-text text-right"><small class="text-muted">Changed post</small></p>
        @endif
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item "><small class="small"><strong> Comments </strong></small>
        <a class="small" id="newComment" href="/createComment">Create comment</a></li>
      </ul>
      @foreach ($postsComments as $postComments)
          @if ($postComments[0]->post_id)
          @foreach ($postComments as $comment)
            <div class="card-body">
            <small>
            <div class="tiny-img-container">
            <img src="/images/avatars/{{$comment->getUser->avatar_name}}" class="tiny-img circular" alt="">
            </div>
            <span><strong>{{$comment->getUser->username}}:</strong></span>
            <span>{{$comment->comment_content}}</span>
            </small>
            </div>
            
          @endforeach
          @endif
      @endforeach
      <script src="/js/newComment.js"></script>
      {{-- Aca va codigo linkeado de JS a newComment.js donde cuando se presiona el Create comment, se desplegara
        un form con un input de texto debajo de los comentarios ya creados --}}
    </div>
  </div>
  </div>
  </div>
  
  
  
  @endforeach
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>
