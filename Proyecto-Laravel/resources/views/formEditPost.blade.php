<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title>Edit Post</title>
</head>
<body>
    @include('layouts.header')
    <main class="container">
        <form class="form" action="/updatePost" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="What's the title of your post?" required value={{$post->title}}>
            </div>
            <div class="form-group">
                <label for="body">Content</label>
            <textarea class="form-control" name="body" id="body" rows="3" placeholder="Write the content of your post" value={{@old('body')}}>{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                <label for="img">
                <input type="file" name="img" value="{{$post->img_name}}">
                </label>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Change Post</button>
                </div>
            </div>
            <input type="hidden" name="id" value="{{$post->post_id}}">
            </form>
        </main>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
    </body>
    </html>
    