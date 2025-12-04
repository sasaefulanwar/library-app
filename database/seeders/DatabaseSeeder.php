<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use App\Models\Member;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $cat1 = Category::create(['name' => 'Fiksi']);
        $cat2 = Category::create(['name' => 'Sains']);

        Book::create([
            'category_id' => $cat1->id,
            'title' => 'Harry Potter',
            'author' => 'J.K Rowling',
            'stock' => 5
        ]);

        Book::create([
            'category_id' => $cat2->id,
            'title' => 'Belajar Laravel 12',
            'author' => 'Programmer Zaman Now',
            'stock' => 3
        ]);

        // Buat Anggota
        Member::create(['name' => 'Budi Santoso', 'email' => 'budi@gmail.com', 'phone' => '08123456789']);
        Member::create(['name' => 'Siti Aminah', 'email' => 'siti@gmail.com', 'phone' => '08987654321']);
    }
}
