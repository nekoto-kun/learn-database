<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function insert()
    {
        DB::table('books')->insert([
            [
                'judul' => 'The Bench',
                'ISBN' => '9780593434512',
                'kategori' => 'Growing Up & Facts of Life',
                'harga' => 181500,
                'halaman' => 40,
                'penerbit' => 'Random House Books for Young Readers'
            ],
            [
                'judul' => 'Economic Dignity',
                'ISBN' => '9781984879875',
                'kategori' => 'Business & Leadership',
                'harga' => 222900,
                'halaman' => 384,
                'penerbit' => 'Penguin Press'
            ],
            [
                'judul' => 'Food by Fire: Grilling and BBQ with Derek Wolf of Over the Fire Cooking',
                'ISBN' => '9781592339754',
                'kategori' => 'Meat Cooking',
                'harga' => 310750,
                'halaman' => 208,
                'penerbit' => 'Harvard Common Press'
            ],
            [
                'judul' => 'The 4-Hour Workweek: Escape 9-5, Live Anywhere, and Join the
New Rich',
                'ISBN' => '9780307465351',
                'kategori' => 'Self-Improvement',
                'harga' => 253500,
                'halaman' => 448,
                'penerbit' => 'Harmony'
            ]
        ]);
    }

    public function select()
    {
        $result = DB::table('books')->get();
        dump($result);

        $result2 = DB::table('books')->where('halaman', '<', 300)->orderBy('harga', 'desc')->get();
        dump($result2);

        $result3 = DB::table('books')->select(['judul', 'harga'])->get();
        dump($result3);

        $result4 = DB::table('books')->skip(1)->take(2)->get();
        dump($result4);

        $result5 = DB::table('books')->where('halaman', '<', 300)->orderBy('harga', 'desc')->first();
        dump($result5->harga);
    }

    public function update()
    {
        $result = DB::table('books')->where('ISBN', '9781592339754')
            ->update(
                [
                    'kategori' => 'Cooking',
                    'harga' => 210000,
                    'updated_at' => now(),
                ]
            );
        dump($result);
    }

    public function delete()
    {
        DB::table('books')->where('harga', '>', 200000)->delete();
    }
}
