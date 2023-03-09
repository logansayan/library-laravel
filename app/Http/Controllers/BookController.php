<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function allBooks () {
        $books = DB::table("books")->get();
        return view("books.all_books", [
            "books" => $books
        ]);
    }

    public function singleBook (Book $book) {
        return view("books.single_book", [
            "book" => $book
        ]);
    }

    public function addBook () {
        return view("books.add_book");
    }

    public function storeBook(Request $request) {
        $formFields = $request->validate([
            "title" => "",
            "author" => "",
            "description" => "",
            "price" => "",
            "published_at" => "",
            "price" => ""
        ]);

        if (!$formFields["title"] == "" && !$formFields["author"] == "") {
            Book::create($formFields);
            return redirect("/")->with("message", "Book added successfully");
        } else {
            return redirect("/addBook")->with("message", "Please fill the required form fields");
        }
    }

    public function editBook(Book $book) {
        return view("books.edit_book", [
            "book" => $book
        ]);
    }

    public function updateBook(Book $book, Request $request) {
        $formFields = $request->validate([
            "title" => "",
            "author" => "",
            "description" => "",
            "price" => "",
            "published_at" => "",
            "price" => ""
        ]);

        $book->update($formFields);

        return redirect("/")->with("message", "Book successfully updated");
    }

    public function deleteBook(Book $book) {
        $title = $book->title;
        $book->delete();
        return redirect("/")->with("message", "Successfully deleted!\"" . $title . "\"");
    }
}
