<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maps extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude'
        
    ];


    public function picup()
    {
        return $this->belongsTo(Picup::class, 'maps_id', 'picup_id');
    }
}
