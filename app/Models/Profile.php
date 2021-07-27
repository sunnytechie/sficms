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

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function attendances() {
        return $this->HasMany(Attendance::class);
    }
}
