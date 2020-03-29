<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/styleCreatePost.css">
  <title>Create Post</title>
</head>
<body>
  <header>
    @include('layouts.header')  
  </header>
  <main class="container pt-5 text-center col-xl-3 ">
  <h1 class="border-bottom-0 border rounded-top mb-0 pb-5 pt-3 bg-light">Create You Post</h1> 
  <form class="form p-3 rounded-bottom border bg-white" action="/post" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="What's the title of your post?" required value={{@old('title')}}>
      </div>
      <div class="form-group">
        <label for="body">Content</label>
        <textarea class="form-control" name="body" id="body" rows="5" placeholder="Write the content of your post" value={{@old('body')}}></textarea>

      </div><br>
      <div class="form-group">
        <label for="img">
          <input type="file" name="img" value="{{@old('img')}}">
        </label>
        <div class="form-group">
          <br>
          <button class="btn btn-primary" type="submit">Post</button>
        </div>
      </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
  </body>
  </html>
  