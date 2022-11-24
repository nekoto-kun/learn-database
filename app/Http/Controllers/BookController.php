<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Selling;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function insert()
    {
        // Model
        // $newBook = new Book();
        // $newBook->judul = "Buku 1";
        // $newBook->harga = 10000;
        // $newBook->halaman = 100;
        // $newBook->save();

        // $newSelling = new Selling();
        // $newSelling->acc_sold_count = 10;
        // $newSelling->acc_earnings = $newBook->harga * 10;

        // $newBook->selling()->save($newSelling);

        // Mass assignment
        $newBook = Book::create([
            "judul" => "Buku 2",
            "harga" => 100000,
            "halaman" => 10
        ]);

        $newBook->selling()->create([
            "acc_sold_count" => 10,
            "acc_earnings" => 10000000
        ]);
    }

    public function update()
    {
        // Update mass assignment
        // $bookToUpdate = Book::find(3);
        // $bookToUpdate->selling()->update([
        //     "acc_sold_count" => 1
        // ]);

        // Update push
        $bookToUpdate = Book::find(3);

        $bookToUpdate->selling->acc_sold_count = 100;
        $bookToUpdate->push();
    }

    public function delete()
    {
        $book = Book::find(1);
        // $book->selling->delete();
        if ($book) {
            $book->delete();
        }
    }

    public function select()
    {
        // $allBooks = Book::all();
        // $allBooks = Book::with('selling')->get();

        // $allBooks = Book::with('selling')->where('harga', '<', 1000000)->get();
        $allBooks = Book::with('selling')->whereHas('selling', function ($query) {
            $query->where('acc_sold_count', '<', 100);
        })->get();

        $allBooks = Book::with('selling')->has('selling')->get();

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

    public function dissociate()
    {
        $book = Book::find(1);
        $book->author()->dissociate();
        $book->save();
    }

    public function attach()
    {
        $book = Book::find(1);
        $book->categories()->attach(Category::find(1));

        $book2 = Book::find(2);
        $book2->categories()->attach(Category::find([1, 2, 3]));
    }

    public function detach()
    {
        $book = Book::find(2);
        $book->categories()->detach(Category::find(2));
    }

    public function sync()
    {
        $book = Book::find(1);
        // $book->categories()->sync(Category::find([2, 4]));
        $book->categories()->syncWithoutDetaching(Category::find([1, 2, 3]));

        $book2 = Book::find(10);
        $book2->categories()->toggle(Category::find([1, 3]));
    }
}
