@extends("base")

@section("content")
    <a href="{{url()->previous()}}">Go Back</a>
    <h2>{{$book->title}}</h2>
    <p>{{$book->author}}</p>
    <p>{{$book->description}}</p>
    <p>{{$book->published_at}}</p>
    <p>${{$book->price}}</p>
    <button>Purchase</button>

    @if (auth()->user()->id == $book->user_id)
    <a href={{route("books.edit", ["book" => $book->id])}}>Edit this book</a>
    <a href="{{route("books.confirmDelete", ["book" => $book->id])}}">Delete this book</a>
    
    @endif
@endsection