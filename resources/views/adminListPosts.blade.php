<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/styleAdminListPosts.css">
    <link rel="shortcut icon" href="{{URL::asset('/icon/iconoPrincipal.jpg')}}" type="image/x-icon">
  </head>

  <body>
  
    @include('layouts.header')
    <main class="container text-center">
      @if( session()->has('message') )
          <div class="alert alert-success">
            {{ session('message')}}
          </div>
      @endif
    <div class="container ">
      <h1 class="mt-5 mb-0 pb-3 pt-3 border bg-light">
        Posts List
      </h1>
      <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Owner</th>
            <th colspan="3">
                <a href="/createPost" class="btn btn-dark ">Create</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach( $posts as $post )
            <tr>
                <td class="fuente">{{$post->post_id}}</td>
                <td class="fuente">{{$post->title}}</td>
                <td class="fuente">{{$post->getUser->username}}</td>
                <td>
                    <a href="/formEditPost/{{$post->post_id}}" class="btn btn-outline-secondary bg-warning">
                        Change
                    </a>
                </td>
                <td>
                  <a href="/postDetails/{{$post->post_id}}" class="btn btn-outline-secondary">
                      Details
                  </a>
              </td>
                <td>
                    <form action="/destroyPost/{{$post->post_id}}" method="post">
                      @csrf
                    <button class="btn btn-outline-secondary bg-danger text-white">
                        Destroy
                    </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
    </main>
  </body>
</html>
