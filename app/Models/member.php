<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'trn',
        'telephone',
        'address'
    ];

    function issuedbook (){
        return $this->hasMany(issuedbook::class,'member_id');
    }
}
