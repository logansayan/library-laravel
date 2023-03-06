<?php

use Illuminate\Support\Facades\Auth;
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

Route::get("/", [BookController::class, "allBooks"])->name("index");

Route::get("/addBook", [BookController::class, "addBook"])->name("add_book");
Route::post("/addBook", [BookController::class, "storeBook"]);

Route::get("/register", [UserController::class, "register"])->name("register");

Auth::routes();
Route::get("/{book}", [BookController::class, "singleBook"])->name("singleBook");

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
