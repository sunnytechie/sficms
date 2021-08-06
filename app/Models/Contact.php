<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'name', 'email', 'user_id', 'state', 'country', 'area', 'chapter', 'category'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function states()
    {
        return $this->belongsTo(State::class);
    }

    public function chapters()
    {
        return $this->belongsTo(Chapter::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function areas()
    {
        return $this->belongsTo(Area::class);
    }

    public function emailCategory()
    {
        return $this->belongsTo(emailCategory::class);
    }
}

