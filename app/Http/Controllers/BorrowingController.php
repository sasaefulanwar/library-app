<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    public function index()
    {
        // Ambil data peminjaman beserta relasinya
        $borrowings = Borrowing::with(['book', 'member'])->latest()->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::where('stock', '>', 0)->get(); // Hanya buku yang ada stok
        $members = Member::all();
        return view('borrowings.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'member_id' => 'required',
        ]);

        // Kurangi Stok Buku
        $book = Book::find($request->book_id);
        $book->decrement('stock');

        // Buat Transaksi
        Borrowing::create([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'borrow_date' => Carbon::now(),
            'due_date' => Carbon::now()->addDays(7), // Default pinjam 7 hari
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dicatat!');
    }

    public function returnBook($id)
    {
        $borrowing = Borrowing::findOrFail($id);

        if ($borrowing->returned_at) {
            return back()->with('error', 'Buku sudah dikembalikan sebelumnya.');
        }

        // Update tanggal kembali
        $borrowing->update([
            'returned_at' => Carbon::now()
        ]);

        // Kembalikan Stok Buku
        $borrowing->book->increment('stock');

        return back()->with('success', 'Buku berhasil dikembalikan!');
    }
}
