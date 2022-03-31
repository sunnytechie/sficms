<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_id',
        'area',
        'date_week',
        'date_month',
        'date_year',
        'spreadsheet',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
