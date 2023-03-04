<?php

namespace App\Http\Controllers;

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
}
