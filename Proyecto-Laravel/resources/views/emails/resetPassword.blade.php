<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail to reset Password</title>
</head>
<body>
    <h1 class="title">You ask for a new password, if you don´t ask for this ignore this email</h1>

    <div class="text-center center">
        <h4 class="center">Your new password is: {{ $request->reset_password }}</h4>
        <h3 class="strong bold">Once you login with this new password, you will be asked to change it</h3>
    </div>
</body>
</html>