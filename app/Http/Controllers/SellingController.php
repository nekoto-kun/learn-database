<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Selling;
use Illuminate\Http\Request;

class SellingController extends Controller
{
    public function select()
    {
        $selling = Selling::find(5);
        echo $selling->acc_sold_count . " buku <b>" . $selling->book->judul . "</b> terjual.";

        $allSellings = Selling::all();
        foreach ($allSellings as $selling) {
            echo "Buku " . $selling->book->judul . " terjual " . $selling->acc_sold_count . " buah<br>";
        }
    }

    public function insert()
    {
        // Add child data related to existing parent data
        $selling = new Selling();
        $selling->acc_earnings = 1000000;
        $selling->acc_sold_count = 10;
        // $selling->book_id = 1;
        $selling->save();

        // Add new Book and its Selling data
        $newBook = new Book();
        $newBook->judul = 'Eloquent ORM';
        $newBook->harga = 100000;
        $newBook->halaman = 100;
        $newBook->save();

        $newSelling = new Selling();
        $newSelling->acc_earnings = 700000;
        $newSelling->acc_sold_count = 7;
        $newSelling->book()->associate($newBook);
        $newSelling->save();
    }

    public function delete()
    {
        $selling = Selling::find(4);
        $selling->delete();
        $selling->book()->delete();
    }
}
