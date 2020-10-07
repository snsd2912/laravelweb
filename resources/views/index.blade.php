<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sanglv11</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css"> 
</head>
<body>
    <!-- login form  -->
    <form action="checklogin" class="form" method="post">
        @csrf
        <h1>LOG IN</h1><br>
        <!-- @if ($errors->any())
            @foreach ($errors->all() as $err)
                <li> {{$err}} </li>
            @endforeach
        @endif -->
        @if (session('message')) 
            <span class="err"> {{ session('message') }} </span>
        @endif
        <span class="err"> @error('username'){{$message}} @enderror </span>
        <input type="text" name="username" placeholder="Username">
        <span class="err"> @error('password'){{$message}} @enderror </span>
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Log in">
    </form>
    
</body>
</html>
