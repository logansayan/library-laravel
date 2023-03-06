@extends("base")

@section("content")
    <h1>Add Book</h1>
    <form action="/addBook" method="POST" >
        @csrf

        <input type="text" name="title" placeholder="Book Title">
        <input type="text" name="author" placeholder="Author of the book">
        <textarea name="description" placeholder="Description of the book..."></textarea>
        <label for="published_at">The book was publised:</label>
        <input type="date" name="published_at" id="published_at">
        <input type="number" name="price" placeholder="Price of the book" step=".01">
        <button>Add Book</button>
    </form>
@endsection