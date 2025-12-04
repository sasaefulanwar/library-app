<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = ['book_id', 'member_id', 'borrow_date', 'due_date', 'returned_at'];

    // Relasi ke Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // Relasi ke Buku
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
