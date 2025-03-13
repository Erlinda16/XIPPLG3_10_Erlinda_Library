<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User1Controller;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BookController;

// Route untuk BooksController
Route::get('/books', [BookController::class, 'index']); // GET all books
Route::get('/books/{id}', [BookController::class, 'show']); // GET a single book
Route::post('/books', [BookController::class, 'store']); // POST a new book
Route::put('/books/{id}', [BookController::class, 'update']); // PUT to update a book
Route::delete('/books/{id}', [BookController::class, 'destroy']); // DELETE a book

Route::get('/loans', [LoanController::class, 'index']); // GET all books
Route::get('/loans/{id}', [LoanController::class, 'show']); // GET a single book
Route::post('/loans', [LoanController::class, 'store']); // POST a new book
Route::put('/loans/{id}', [LoanController::class, 'update']); // PUT to update a book
Route::delete('/loans/{id}', [LoanController::class, 'destroy']); // DELETE a book

Route::get('/reviews', [ReviewController::class, 'index']); // GET all books
Route::get('/reviews/{id}', [ReviewController::class, 'show']); // GET a single book
Route::post('/reviews', [ReviewController::class, 'store']); // POST a new book
Route::put('/reviews/{id}', [ReviewController::class, 'update']); // PUT to update a book
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']); // DELETE a book

// Route untuk UsersController
Route::get('/user1s', [User1Controller::class, 'index']); // GET all users
Route::get('/user1s/{id}', [User1Controller::class, 'show']); // GET a single user
Route::post('/user1s', [User1Controller::class, 'store']); // POST a new user
Route::put('/user1s/{id}', [User1Controller::class, 'update']); // PUT to update a user
Route::delete('/user1s/{id}', [User1Controller::class, 'destroy']); // DELETE a user

// Route untuk CategoriesController
Route::get('/categories', [CategoryController::class, 'index']); // GET all categories
Route::get('/categories/{id}', [CategoryController::class, 'show']); // GET a single category
Route::post('/categories', [CategoryController::class, 'store']); // POST a new category
Route::put('/categories/{id}', [CategoryController::class, 'update']); // PUT to update a category
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // DELETE a category

 
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 
Route::apiResource('categories', CategoryController::class);
Route::apiResource('reviews', ReviewController::class);
Route::apiResource('user', User1Controller::class);
Route::apiResource('books', BookController::class);
Route::apiResource('loans', LoanController::class);