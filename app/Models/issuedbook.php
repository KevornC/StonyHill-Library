<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class issuedbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'book_id',
        'issued_date',
        'return_date',
        'days_remaining'
    ];

    public function member(){
        return $this->belongsTo(member::Class,'member_id');
    }
    public function book(){
        return $this->belongsTo(book::Class,'book_id');
    }
}
