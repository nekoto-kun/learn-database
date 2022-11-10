<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function insert()
    {
        // Single insert
        $newBook = new Book();
        $newBook->judul = "Buku Baru";
        $newBook->isbn = "1234567890123";
        $newBook->kategori = "Edukasi";
        $newBook->harga = 100000;
        $newBook->halaman = 100;
        $newBook->penerbit = "CV. Edu";

        $newBook->save();

        // Mass Assignment
        Book::create(
            [
                "judul" => "Buku Baru Banget",
                "isbn" => "1234567891129",
                "kategori" => "Edukasi",
                "harga" => 120000,
                "halaman" => 120,
                "penerbit" => "CV. Edu"
            ]
        );

        // Multiple data insert
        // Book::insert([
        //     [
        //         "judul" => "Buku Baru Banget",
        //         "isbn" => "1234567890129",
        //         "kategori" => "Edukasi",
        //         "harga" => 120000,
        //         "halaman" => 120,
        //         "penerbit" => "CV. Edu",
        //         "created_at" => now()
        //     ],
        //     [
        //         "judul" => "Buku Baru Banget",
        //         "isbn" => "1234567899125",
        //         "kategori" => "Edukasi",
        //         "harga" => 120000,
        //         "halaman" => 120,
        //         "penerbit" => "CV. Edu",
        //         "created_at" => now()
        //     ]
        // ]);
    }

    public function update()
    {
        // Single update
        // $bookToUpdate = Book::find(1);
        $bookToUpdate = Book::where('isbn', '1234567890123')->first();
        $bookToUpdate->judul = "Buku Aing";

        $bookToUpdate->save();

        // Mass update
        Book::where('isbn', '1234567890123')->first()->update([
            "harga" => 200000
        ]);
    }

    public function delete()
    {
        // Normal single delete
        Book::find(1)->delete();

        // Forced single delete from soft-delete-enabled model
        Book::withTrashed()->find(1)->forceDelete();
    }

    public function select()
    {
        // Get all data from table
        $result = Book::all();

        // dump($result);
        foreach ($result as $row) {
            echo $row->judul . "<br>";
        }

        // Get all data with specified columns from table
        $result2 = Book::all(['judul', 'harga']);

        foreach ($result2 as $row) {
            echo $row->judul . ": " . $row->harga . "<br>";
        }

        // Get filtered data from table
        $result3 = Book::where('harga', '>', 1000000)->get();

        foreach ($result3 as $row) {
            echo $row->judul . "<br>";
        }

        // Get latest inserted data
        $result4 = Book::latest()->get();
        dump($result4);

        // Limit data to be fetched
        $result5 = Book::limit(5)->get();
        dump($result5);

        // Skip and take data to be fetched
        $result6 = Book::skip(1)->take(2)->get();
        dump($result6);
    }
}
