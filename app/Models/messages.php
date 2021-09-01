<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    use HasFactory;



    protected $fillable = ['title', 'message', 'email', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function contacts(){
        return $this->belongsToMany(Contact::class, 'contacts_messages', 'messages_id', 'contacts_id')->withTimestamps();
    }
}
