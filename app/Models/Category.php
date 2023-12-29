<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'price_per_km'];

    public function picks()
{
    return $this->hasMany(Pick::class, 'id', 'id');
}

}
