<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function select()
    {
        // $book = Book::find(4);
        // // dump($book);
        // // dump($book->selling);

        // echo "<h3>" . $book->judul . "</h3>";
        // echo "<p>";
        // echo "Harga: " . $book->harga . "<br>";
        // echo "Halaman: " . $book->halaman . "<br>";
        // echo "Pendapatan penjualan: " . $book->selling->acc_earnings . "<br>";
        // echo "Buku terjual: " . $book->selling->acc_sold_count . "<br>";
        // echo "Rata-rata nilai jual buku: " . ($book->selling->acc_earnings / $book->selling->acc_sold_count);
        // echo "</p>";

        $allBooks = Book::all();
        dump($allBooks);
        $allBooks = Book::with('selling')->get();
        dump($allBooks);

        $allBooks = Book::with('selling')->has('selling')->get();
        dump($allBooks);
        $allBooks = Book::doesntHave('selling')->get();
        dump($allBooks);

        $allBooks = Book::whereHas('selling', function ($row) {
            $row->where('acc_earnings', '<', 1000000);
        })->get();
        dump($allBooks);
    }
}
