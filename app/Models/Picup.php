<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picup extends Model
{
    use HasFactory;

    protected $table = 'picups';

    protected $fillable = [
        'name',
        'description',
        'address',
        'no_tlp',
        'latitude',
        'longitude',
        'image',

    ];

    // public function maps()
    // {
    //     return $this->hasOne(Maps::class, 'id', 'id');
    // }
}
