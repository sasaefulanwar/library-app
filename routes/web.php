<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('borrowings', BorrowingController::class);

Route::patch('/borrowings/{id}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');
