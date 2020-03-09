<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Navbar</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/faqs">FAQ's</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contactUs" tabindex="-1">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/createPost">Post</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Options</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/formEdit">Edit User</a>
            <a class="dropdown-item" href="/userDetails/{{session('user_id')}}">Show my profile</a>
              <a class="dropdown-item" href="/myPosts">Show my posts</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/logout">Log Out</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </header>