<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function insert()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function select()
    {
        // $allBooks = Book::all();
        $allBooks = Book::with('selling')->get();

        echo "<ol>";
        foreach ($allBooks as $book) {
            echo "<li>";

            echo $book->judul . "(" . $book->harga . ")";

            if ($book->selling) {
                echo "<br>";
                echo "Terjual: " . $book->selling->acc_sold_count;
            }

            echo "</li>";
        }
        echo "</ol>";
    }
}
