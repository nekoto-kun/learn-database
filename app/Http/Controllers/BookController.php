<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function insert()
    {
        // $book = new Book();

        // $book->judul = "Buku #1";
        // $book->halaman = 100;
        // $book->penerbit = "ANDI";
        // $book->harga = 100000;
        // $book->isbn = "1234567890123";
        // $book->kategori = "Undang-Undang";

        // $book->save();

        Book::create(
            [
                'judul' => 'The Bench',
                'isbn' => '9780593434412',
                'kategori' => 'Growing Up & Facts of Life',
                'harga' => 181500,
                'halaman' => 40,
                'penerbit' => 'Random House Books for Young Readers'
            ]
        );
    }

    public function update()
    {
        // $book = Book::find(1);
        // $book->judul = "Buku Bagus";
        // $book->harga = 250000;

        // $book = Book::where('isbn', '1234567890123')->first();
        // $book->judul = "Buku Jelek";
        // $book->harga = 350000;
        // $book->save();

        Book::where('isbn', '1234567890123')->first()->update([
            'judul' => "Buku Bagus",
            'harga' => 100000
        ]);
    }

    public function delete()
    {
        Book::find(1)->delete();
        // echo Book::destroy(1);
    }

    public function select()
    {
        // $result = Book::all();
        // $result = Book::where('harga', '<', 200000)->get();
        // $result = Book::latest()->get();
        $result = Book::withTrashed()->get();

        foreach ($result as $book) {
            echo "Judul buku: " . $book->judul . "<br>";
        }

        dump($result);
    }

    public function restore()
    {
        Book::withTrashed()->find(1)->restore();
    }
}
