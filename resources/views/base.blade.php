<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("page_title")</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="/css/style.css" />
</head>
<body>
    <div x-data="{'show': true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
      <p>{{ session("message") }}</p>
    </div>    


    @auth

    <h4 style="text-align: center;">{{auth()->user()->name}}</h4>
    
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    @else
    <a href="/login">Log in</a>
    <a href="/register">Register</a>
    @endauth
    @yield("content")
</body>
</html>