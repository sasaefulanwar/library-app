<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return redirect()->route('borrowings.index');
});

Route::resource('borrowings', BorrowingController::class);
Route::patch('/borrowings/{id}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');

Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);
