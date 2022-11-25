<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function pivot()
    {
        $category = Category::find(1);

        echo "Daftar buku di dalam kategori <b>$category->nama</b><hr>";

        echo "<ul>";
        foreach ($category->books as $book) {
            $created_at = $book->pivot->created_at ?
                " (ditambahkan pada: " . $book->pivot->created_at->isoFormat('D MMMM Y') . ")"
                : "";

            echo "<li>$book->judul" . $created_at . "</li>";
        }
        echo "</ul>";
    }
}
