@extends("base")

@section("content")
    <a href="{{url()->previous()}}">Go Back</a>
    <h2>{{$book->title}}</h2>
    <p>{{$book->author}}</p>
    <p>{{$book->description}}</p>
    <p>{{$book->published_at}}</p>
    <p>${{$book->price}}</p>
    <button>Purchase</button>

@endsection