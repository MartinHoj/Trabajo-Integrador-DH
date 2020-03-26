<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>
<body>
    <h1 class="title text-center">Contact us problem from Socialize send from {{$request->email}}</h1>

    <h3 class="font-weight-bold">{{$request->title}}</h3>
    <div class="text-justify font-weight-normal">{{$request->comments}}</div>
    
</body>
</html>