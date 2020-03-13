<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User List</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('layouts.header')
    <main class="container">
      @if( session()->has('message') )
          <div class="alert alert-success">
            {{ session('message')}}
          </div>
      @endif
    <div class="container">
      <h1>
        Users List
      </h1>
      <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Username</th>
            <th colspan="3">
                <a href="/..." class="btn btn-dark">Create</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach( $users as $user )
            <tr>
                <td>{{$user->user_id}}</td>
                <td>{{$user->username}}</td>
                <td>
                    <a href="/formEdit/{{$user->user_id}}" class="btn btn-outline-secondary">
                        Change
                    </a>
                </td>
                <td>
                  <a href="/userDetails/{{$user->user_id}}" class="btn btn-outline-secondary">
                      Details
                  </a>
              </td>
                <td>
                    <form action="/destroy/{{$user->user_id}}" method="post">
                      @csrf
                    <button class="btn btn-outline-secondary">
                        Destroy
                    </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
    </main>
  </body>
</html>
