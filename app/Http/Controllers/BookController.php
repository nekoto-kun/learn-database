<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Selling;
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

    public function insert()
    {
        // Biasa
        $book = new Book();
        $book->judul = "Buku Baru";
        $book->harga = 10000;
        $book->halaman = 10;
        $book->save();

        $selling = new Selling();
        $selling->acc_earnings = 1000000;
        $selling->acc_sold_count = 100;

        $book->selling()->save($selling);

        // Mass assignment
        $book = Book::create([
            "judul" => "Buku Baru #2",
            "harga" => 120000,
            "halaman" => 50
        ]);

        $book->selling()->create([
            "acc_earnings" => 1000000,
            "acc_sold_count" => 100
        ]);

        echo "Data buku <b>" . $book->judul . "</b> tersimpan dengan jumlah buku terjual sebanyak " . $book->selling->acc_sold_count;
    }

    public function update()
    {
        // Mass assignment
        // $book = Book::has('selling')->find(1);
        $book = Book::find(1);

        if ($book->selling) {
            $book->selling()->update([
                "acc_sold_count" => 300
            ]);

            echo "Buku <b>" . $book->judul . "</b> terjual sebanyak " . $book->selling->acc_sold_count;
        } else {
            echo "Data buku <b>" . $book->judul . "</b> tidak ada data penjualan!";
        }

        // Update push
        $bookToUpdate = Book::find(3);

        $bookToUpdate->selling->acc_earnings = 500000;
        $bookToUpdate->push();
    }

    public function delete()
    {
        // Delete normal tanpa DELETE CASCADE
        $book = Book::find(3);
        $book->selling->delete();
        $book->delete();

        $book = Book::find(3);
        // if ($book->selling) {
        //     $book->selling->delete();
        // }
        $book->delete();
    }
}
