<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pick extends Model
{
    use HasFactory;

    protected $table = 'pickups';

    protected $fillable = ['name', 'description', 'address', 'no_tlp', 'latitude', 'longitude', 'image', 'category_id', 'start_time', 'end_time'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
