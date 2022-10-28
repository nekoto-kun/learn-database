<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $result = DB::select("SELECT * FROM books");

        dump($result);
    }

    public function insert()
    {
        $result = DB::insert(
            "INSERT INTO books (judul, halaman, isbn, kategori, penerbit, harga, created_at) VALUES (:judul, :halaman, :isbn, :kategori, :penerbit, :harga, NOW())",
            [
                "judul" => "Buku Nikah #2",
                "halaman" => 10,
                "isbn" => "1239997890123",
                "kategori" => "Rumah Tangga",
                "penerbit" => "KUA",
                "harga" => 0.05
            ]
        );

        dump($result);
    }
}
