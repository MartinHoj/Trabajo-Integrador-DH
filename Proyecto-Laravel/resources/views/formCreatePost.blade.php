<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title>Create Post</title>
  </head>
  <body>
    <main class="container">
    <form class="form" action="/post" method="post" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="What's the title of your post?" required value={{@old('title')}}>
  </div>
  <div class="form-group">
    <label for="body">Content</label>
    <textarea class="form-control" name="body" id="body" rows="3" placeholder="Write the content of your post" value={{@old('body')}}></textarea>
  </div>
  <div class="form-group">
    <label for="img">
      <input type="file" name="img" value="{{@old('img')}}">
    </label>
    <div class="form-group">
    <button class="btn btn-primary" type="submit">Post</button>
    </div>
</form>
    </main>
  </body>
</html>
