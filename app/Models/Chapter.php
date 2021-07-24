<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;


    protected $fillable = ['name','state_id', 'country_id', 'areas_id'];


    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function areas()
    {
        return $this->belongsTo(Area::class);
    }
}
