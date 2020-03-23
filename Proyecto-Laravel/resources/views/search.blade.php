<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Busqueda</title>
</head>
<body>
    @include('layouts.header');
    <main class="container center align-center text-center main">
        <h1 class="title">Resultados de su búsqueda:</h1>
        <ul class="nav nav-pills mb-3 text-center" style="margin:0 35%" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active mr-4" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Posts</a>
            </li>
        </ul>
        <div class="tab-content center" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @foreach ($users as $user)
                <div class="card mb-3" style="max-width: 600px;">
                    <div class="row no-gutters" data-user="{{$user->user_id}}" style="cursor:pointer">
                        <div class="col-md-4">
                            <img src="/images/avatars/{{$user->avatar_name}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$user->username}}</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated {{$user->updated_at}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>    
                @endforeach
                @if (count($users) == 0)
                <div class="alert alert-secondary" role="alert">
                    There are no users for your search
                </div>
                @endif
                
                <script>
                    let cards = document.querySelectorAll('.no-gutters');
                    for (let card of cards) {
                        let user_id = card.getAttribute('data-user');
                        let location = '/userDetails/' + user_id;
                        card.onclick = function(){
                            window.location = location;
                        }
                    }
                </script>
                
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @foreach ($posts as $post)
                <div class="card mb-3" style="max-width: 600px;">
                    <div class="row no-gutters" data-post="{{$post->post_id}}" style="cursor:pointer">
                        <div class="col-md-4">
                            <img src="/images/avatars/{{$post->img_name}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{$post->body}}</p>
                                <p class="card-text"><small class="text-muted">Last updated {{$post->updated_at}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>    
                @endforeach
                @if (count($posts) == 0)
                <div class="alert alert-secondary" role="alert">
                    There are no posts for your search
                </div>
                @endif
                
                <script>
                    let postCards = document.querySelectorAll('.no-gutters');
                    for (let card of postCards) {
                        let post_id = card.getAttribute('data-post');
                        let location = '/postDetails/' + post_id;
                        card.onclick = function(){
                            window.location = location;
                        }
                    }
                </script>
                
                
            </div>
        </div>
    </main>
    {{-- {{dd($posts,$users)}} --}}
    
    
    
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>