<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databank extends Model
{
    use HasFactory;

    protected $fillable = ['email',  'occupation', 'position', 'area', 'member',  'fullname', 'member', 'category', 'phone'];

}
