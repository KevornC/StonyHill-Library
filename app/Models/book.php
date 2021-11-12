<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_nm',
        'book_color',
        'total_pages',
        'book_condition',
        'book_quantity',
        'author_nm',
        'publisher',
        'date_published',
    ];
    function issuedbook(){
        return $this->hasMany(issuedbook::class,'book_id');
    }

}
