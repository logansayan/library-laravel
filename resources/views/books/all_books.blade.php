@extends("base")

@section("page_title")
    All Books
@endsection

@section("content")
    <h1>Book Store</h1>
    @if (count($books) > 0)
        <div class="books">
            @foreach($books as $book)
                <div class="book">
                    <a href="/{{$book->id}}" class="title">{{$book->title}} - {{$book->author}}</a>
                    <p>{{Str::limit($book->description, 200)}}</p>
                    <div class="bottom">
                        <p class="author">- {{$book->author}}</p>
                        <p class="published">published: {{$book->published_at}}</p>
                    </div>
                    <button>Buy for ${{$book->price}}</button>
                </div>
            @endforeach
        </div>
    @endif

    <a href="/addBook" class="add-btn">Add a book</a>
@endsection