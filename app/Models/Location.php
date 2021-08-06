<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'area',
        'city',
        'user_id',
    ];

    public function location() {
        return $this->belongsTo(Location::class);
    }
}
