<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function select()
    {
        $allAuthors = Author::all();
        // $allAuthors = Author::withCount('books')->get();

        echo "<table border='1'>";
        echo "<thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kota</th>
                <th>Negara</th>
                <th>Book List</th>
            </tr>
        </thead>";

        echo "<tbody>";

        foreach ($allAuthors as $author) {
            $author->loadCount('books');

            echo "<tr>";
            echo "<td>" . $author->id . "</td>";
            echo "<td>" . $author->nama . "</td>";
            echo "<td>" . $author->kota . "</td>";
            echo "<td>" . $author->negara . "</td>";

            echo "<td>";
            echo "<p>Jumlah buku: " . $author->books_count . "</p>";
            echo "<ul>";
            foreach ($author->books as $book) {
                if ($book->halaman < 300) {
                    echo "<li>" . $book->judul . "</li>";
                }
            }
            echo "</ul></td>";

            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    }

    public function insert()
    {
        $author = Author::find(1);

        $author->books()->createMany([
            [
                "judul" => "Buku 1",
                "harga" => 100000,
                "halaman" => 10
            ],
            [
                "judul" => "Buku 2",
                "harga" => 200000,
                "halaman" => 20
            ]
        ]);
    }

    public function update()
    {
        $author = Author::find(2);

        $author->books()->where('harga', '>', 100000)->update([
            "author_id" => 4
        ]);
    }

    public function delete()
    {
        $author = Author::find(3);
        $author->delete();
    }
}
