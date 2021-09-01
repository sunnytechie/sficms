<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactsMessages extends Model
{
    use HasFactory;

    protected $fillable = ['contacts_id', 'messages_id'];
}
