<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name',  'title', 'email', 'country', 'state',  'area', 'chapter', 'user_id'];

    public  function contacts()
    {
    return $this->hasMany(Contact::class);
    }

    public  function states()
    {
        return $this->hasMany(State::class);
    }
    public  function Chapter()
    {
        return $this->hasMany(Chapter::class);
    }
}
