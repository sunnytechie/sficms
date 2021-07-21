<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'abbreviation', 'country_id'];

    public function contries()
    {
        return $this->belongsTo(Country::class);
    }

    public function states()
    {
        return $this->hasMany(Area::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
