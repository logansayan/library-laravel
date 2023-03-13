@extends("base")

@section("content")
    <h1>Add Book</h1>
    <form action="/addBook" method="POST" >
        @csrf

        <input type="text" name="title" placeholder="Book Title" value="{{old('title')}}">
        <input type="text" name="author" placeholder="Author of the book" value="{{old('author')}}">
        <textarea name="description" placeholder="Description of the book...">{{old('description')}}</textarea>
        <label for="published_at">The book was publised:</label>
        <input type="date" name="published_at" id="published_at" value="{{old('published_at')}}">
        <input type="number" name="price" placeholder="Price of the book" step=".01" value="{{old('price')}}">
        <button>Add Book</button>
    </form>
@endsection