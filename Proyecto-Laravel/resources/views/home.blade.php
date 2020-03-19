<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/imageSize.css">
    <title>Home</title>
</head>
<body>
    @include('layouts.header')

    <h1 class="title display text-center">
        Welcome to our social network
    </h1>
    {{-- Un carrousel que hay que mejorar las flechas para pasar de imagen --}}
    {{-- <div id="carrousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="..." class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> --}}
      
      @foreach ($allPosts as $post)
      <div class="container center">
        <div class="card" style="width: 25rem;">
            <img src="/images/posts/{{$post->img_name}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->body}}</p>
              <p class="card-text"><small class="text-muted">Last updated {{$post->updated_at}}</small></p>
              @if (!($post->updated_at == $post->created_at))
              <p class="card-text text-right"><small class="text-muted">Changed post</small></p>
              @endif
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item "><small class="small"><strong> Comments </strong></small>
                <a class="small commentBtn" name="{{$post->post_id}}" href="#">Create comment</a></li>
            </ul>
        
          
      @foreach ($postsComments as $postComments)
      @if ($postComments[0]->post_id == $post->post_id)
          @foreach ($postComments as $comment)
          <div class="container center">
            <div class="card-body">
            <small>
            <div class="tiny-img-container">
            <img src="/images/avatars/{{$comment->getUser->avatar_name}}" class="tiny-img circular" alt="">
            </div>
            <span><strong>{{$comment->getUser->username}}:</strong></span>
            <span>{{$comment->comment_content}}</span>
            </small>
            </div>
        </div>
        @endforeach
        @endif
        @endforeach
        <form action="/createComment" method="post">
            @csrf
            <div class="center container">
              <input type="hidden" name="newComment" class="createComment comment center" id="{{$post->post_id}}">
              <input type="hidden" name="post_id" value="{{$post->post_id}}">
              <button type="submit" hidden class="btn btn-primary small" id="button{{$post->post_id}}">Make Comment</button>
            </div>
          </form>
          <script src="/js/newComment.js"></script>
            </div>
        @endforeach    
      </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>
