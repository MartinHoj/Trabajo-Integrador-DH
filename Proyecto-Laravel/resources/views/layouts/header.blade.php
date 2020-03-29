<link rel="stylesheet" href="/css/headerStyle.css">
<link href="https://fonts.googleapis.com/css?family=Autour+One|Gloria+Hallelujah|Patrick+Hand|Satisfy&display=swap" rel="stylesheet">

<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light pt-5 pb-5 border-bottom">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/home">SOCIALIZAR</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link rounded mr-2 btn-outline-primary" href="/home">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link rounded mr-2 btn-outline-primary" href="/faqs">FAQ's</a>
          </li>
          <li class="nav-item">
            <a class="nav-link rounded mr-2 btn-outline-primary" href="/contactUs" tabindex="-1">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link rounded mr-2 btn-outline-primary" href="/createPost">Post</a>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle mr-2 btn-outline-primary " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="drop" [autoClose]="'always'">Options</a>
            <div class="dropdown-menu" id="show">
              <a class="dropdown-item" href="/formEditData">Edit User</a>
              <a class="dropdown-item" href="/userDetails/{{session('user_id')}}">Show my profile</a>
              <a class="dropdown-item" href="/myPosts">Show my posts</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/logout">Log Out</a>
            </div>
          </li>
          <script>
            // Soluciono el problema del dropdown en userDetails
            let drop = document.getElementById('drop');
            let down = document.getElementById('show');
            let li = document.querySelector('.dropdown');
            drop.onclick = function(event){
              if (down.classList.contains('show')) {
                //down.classList.remove('show');
                //drop.setAttribute('aria-expanded','false');
                //li.classList.remove('show');
                //event.preventDefault();
                down.style.display = 'none';
                //down.classList.remove('show');
              } else {
                //down.classList.add('show');
                down.style.display = 'block';
              }
            //console.log(down);
           }
          </script>
          @if (session('role_id') == 1)
          <li class="nav-item">
            <a class="nav-link rounded mr-2 btn-outline-primary" href="/listUsers">List Users</a>
          </li>
          <li class="nav-item rounded mr-2 btn-outline-primary">
            <a class="nav-link" href="/listPosts">List Posts</a>
          </li>
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-2 btn-outline-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="drop" [autoClose]="'always'">
              Notifications <span class="badge badge-danger">{{count(session('notifications'))}}</span>
            </a>
            <div class="dropdown-menu" id="show">
              @foreach (session('notifications') as $userFriend)
              <a class="dropdown-item" href="/userDetails/{{$userFriend->user_id}}">{{$userFriend->username}} te ha enviado una solicitud de amistad!</a>
              <a class="btn-sm btn-primary btn" href="/acceptFriend/{{$userFriend->user_id}}" role="button">Aceptar Amigo</a>
              @endforeach
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="/search">
          @csrf
          <input class="form-control mr-sm-2 nav-link rounded mr-2 " type="search" placeholder="Search" aria-label="Search" name="search">
          <button class="btn btn-outline-success my-2 my-sm-0 nav-link rounded mr-2 btn-outline-primary" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </header>
