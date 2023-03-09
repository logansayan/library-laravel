@extends("base")

@section("content")
    <a href="{{url()->previous()}}">Go Back</a>
    <h2>{{$book->title}}</h2>
    <p>{{$book->author}}</p>
    <p>{{$book->description}}</p>
    <p>{{$book->published_at}}</p>
    <p>${{$book->price}}</p>
    <button>Purchase</button>

    <a href={{route("books.edit", ["book" => $book->id])}}>Edit this book</a>
    <form action={{route("books.delete", ["book" => $book->id])}} method="POST">
        @csrf
        @method("delete")
        <button>Delete this book</button>
    </form>
@endsection