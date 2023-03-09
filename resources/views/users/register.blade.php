@extends("base")

@section("page_title")
    Register
@endsection

@section("content")

    <h1>REGISTER</h1>
    <form action="/register" method="post">
        @csrf
        <input type="text" placeholder="My Name is" name="name">
        @error("name")
            <p>{{$message}}</p>
        @enderror
        <input type="email" placeholder="My Email is" name="email">
        @error("email")
            <p>{{$message}}</p>
        @enderror
        <input type="password" placeholder="Password" name="password">
        @error("password")
            <p>{{$message}}</p>
        @enderror
        <input type="password" placeholder="Confirm Password" name="password_confirmation">
        @error("password_confirmation")
            <p>{{$message}}</p>
        @enderror
        <button>Create Account</button>
    </form>

@endsection