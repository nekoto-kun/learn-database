<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            // $table->char('ISBN', 13)->unique();
            // $table->string('kategori', 255);
            $table->bigInteger('harga');
            $table->integer('halaman');
            // $table->string('penerbit', 255);
            $table->unsignedBigInteger('author_id');
            $table->timestamps();
            // $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
