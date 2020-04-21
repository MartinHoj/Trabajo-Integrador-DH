<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/imageSize.css">
    <title>Post "{{$post->title}}"</title>
    <link rel="shortcut icon" href="{{URL::asset('/icon/iconoPrincipal.jpg')}}" type="image/x-icon">
</head>
<body>
    @include('layouts.header')
    <div class="container center main">
        <div class="card" style="width: 25rem;">
            <img src="/storage/images/posts/{{$post->img_name}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h6 class="card-title title strong">{{$post->getUser->username}}</h6>
                @if (!session('guest'))
                <p class="text-right"><small class="text-right card-text"><a href="/formEditPost/{{$post->post_id}}">Change Post</a></small></p>
                @endif
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
                @if (!(count($postComments) === 0))
                @foreach ($postComments as $comment)
                <div class="card-body">
                    <small>
                        <div class="tiny-img-container">
                            <img src="/storage/images/avatars/{{$comment->getUser->avatar_name}}" class="tiny-img circular" alt="">
                        </div>
                        <span><strong>{{$comment->getUser->username}}:</strong></span>
                        <span>{{$comment->comment_content}}</span>
                    </small>
                </div>
                
                @endforeach
                @endif
                <form action="/createComment" method="post">
                    @csrf
                    <div class="center container">
                      <input type="hidden" name="newComment" class="createComment comment center" id="{{$post->post_id}}">
                      <input type="hidden" name="post_id" value="{{$post->post_id}}">
                      <button type="submit" hidden class="btn btn-primary small" id="button{{$post->post_id}}">Make Comment</button>
                    </div>
                  </form>
                  <script src="/js/newComment.js"></script>
                
            </body>
            </html>