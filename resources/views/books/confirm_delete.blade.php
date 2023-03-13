@extends("base")

@section("page_title")
    Confirm delete "{{$book->title}}"?
@endsection

@section("content")
    <h2>Are you sure?</h2>
    <p>Confirm delete "{{$book->title}}"?</p>
    <form action={{route("books.delete", ["book" => $book->id])}} method="POST">
        @csrf
        @method("delete")
        <button>CONFIRM DELETE</button>
    </form>
@endsection