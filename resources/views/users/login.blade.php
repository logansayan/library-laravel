@extends("base")

@section("page_title")
    Login
@endsection

@section("content")
    <h1>Login</h1>
    <form action="/login" method="post">
        @csrf
        <input type="email" placeholder="My Email is" name="email">
        @error("email")
            <p>{{$message}}</p>
        @enderror
        <input type="password" placeholder="My Password is" name="password">
        @error("password")
            <p>{{$message}}</p>
        @enderror
        <button>Sign In</button>
    </form>
@endsection