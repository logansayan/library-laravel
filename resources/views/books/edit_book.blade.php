@extends("base")

@section("page_title")
    {{$book->title}}
@endsection

@section("content")

    <form action={{route("books.edit", [$book->id])}} method="POST">
        @csrf
        @method("put")
        <input type="text" name="title" placeholder="Book Title" value="{{$book->title}}">
        <input type="text" name="author" placeholder="Author of the book" value="{{$book->author}}">
        <textarea name="description" placeholder="Description of the book...">{{$book -> description}}</textarea>
        <label for="published_at">The book was publised:</label>
        <input type="date" name="published_at" id="published_at" value="{{$book->published_at}}">
        <input type="number" name="price" placeholder="Price of the book" step=".01" value="{{$book->price}}">
        <button>Save Changes</button>
    </form>

@endsection