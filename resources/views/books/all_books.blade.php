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
                    <h4>{{$book->title}} - {{$book->author}}</h4>
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
@endsection