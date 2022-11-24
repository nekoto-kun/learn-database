<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function pivot()
    {
        $allCategories = Category::all();

        echo "<ul>";
        foreach ($allCategories as $category) {
            echo "<li>";
            echo $category->nama;

            if ($category->books) {
                echo "<ul>";
                foreach ($category->books as $book) {
                    $tgl = $book->pivot->created_at ? " ({$book->pivot->created_at->isoFormat('D MMMM Y')})" : "";
                    echo "<li>";
                    echo $book->judul . $tgl;
                    echo "</li>";
                }
                echo "</ul>";
            }
            echo "</li>";
        }
        echo "</ul>";
    }
}
