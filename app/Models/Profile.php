<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'avatar',
        'name',
        'email',
        'phone',
        'area',
        'city',
        'country',
        'zip_code',
    ];
}
