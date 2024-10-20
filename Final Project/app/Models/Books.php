<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = ['title', 'summary', 'stock', 'image', 'category_id'];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function listPeminjaman(){
        return $this->hasMany(Barrows::class, "books_id");
    }
}

