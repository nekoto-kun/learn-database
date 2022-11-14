<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    // use SoftDeletes;

    // protected $fillable = ['judul', 'isbn', 'kategori', 'harga', 'halaman', 'penerbit'];
    protected $guarded = [];

    public function selling()
    {
        return $this->hasOne('App\Models\Selling');
    }
}
