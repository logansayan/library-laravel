<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get("/register", [UserController::class, "register"])->name("users.register");
Route::post("/register", [UserController::class, "store"]);

Route::get("/login", [UserController::class, "login"])->name("login");
Route::post("/login", [UserController::class, "authenticate"]);

Route::post("/logout", [UserController::class, "logout"])->name("logout")->name("users.logout")->middleware("auth");
Route::get("/addBook", [BookController::class, "addBook"])->name("books.add")->middleware("auth");
Route::post("/addBook", [BookController::class, "storeBook"])->middleware("auth");

Route::get("{book}/edit", [BookController::class, "editBook"])->name("books.edit")->middleware("auth");
Route::put("{book}/edit", [BookController::class, "updateBook"])->middleware("auth");
Route::delete("{book}/delete", [BookController::class, "deleteBook"])->name("books.delete")->middleware("auth");

Route::get("/", [BookController::class, "allBooks"])->name("users.index");
Route::get("/{book}", [BookController::class, "singleBook"])->name("books.book");


