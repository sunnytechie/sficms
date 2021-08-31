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

    public function messages(){
        return $this->belongsToMany(messages::class, 'contacts_messages');
    }
}

