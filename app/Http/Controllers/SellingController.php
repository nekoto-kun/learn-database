<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Selling;
use Illuminate\Http\Request;

class SellingController extends Controller
{
    public function select()
    {
        // Single fetch
        // $selling = Selling::find(2);

        // echo "Buku " . $selling->book->judul . " terjual " . $selling->acc_sold_count . " buah";

        // Get all
        $allSellings = Selling::all();
        foreach ($allSellings as $selling) {
            echo "Buku " . $selling->book->judul . " terjual " . $selling->acc_sold_count . " buah<br>";
        }
    }

    public function insert()
    {
        // Model
        // $selling = new Selling();
        // $selling->acc_sold_count = 10;
        // $selling->acc_earnings = 1000000;
        // $selling->book_id = 1; // Set foreign id
        // $selling->save();

        // Associate
        // New book
        // $book = new Book();
        // $book->judul = "Buku 4";
        // $book->harga = 100000;
        // $book->halaman = 50;
        // $book->save();

        // Existing book
        $book2 = Book::find(2);

        $selling2 = new Selling();
        $selling2->acc_sold_count = 100;
        $selling2->acc_earnings = 10000000;

        // $selling2->book()->associate($book);
        $selling2->book()->associate($book2);

        $selling2->save();
    }

    public function delete()
    {
        $selling = Selling::find(4);
        // $selling->delete();
        $selling->book()->delete();
    }
}
