<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Book;
use App\Models\Selling;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $faker->seed(123);

        for ($i = 0; $i < 10; $i++) {
            Book::create(
                [
                    'judul' => $faker->sentence,
                    'harga' => $faker->randomFloat(0, 10000, 1000000),
                    'halaman' => $faker->randomNumber(3),
                ]
            );
        }
        for ($i = 0; $i < 5; $i++) {
            Selling::create(
                [
                    'acc_earnings' => $faker->randomFloat(0, 0, 2000000),
                    'acc_sold_count' => $faker->randomNumber(3),
                    'book_id' => $faker->unique()->randomDigit,
                ]
            );
        }
    }
}
