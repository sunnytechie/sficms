<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
protected $fillable =[
    'profile_id',
    'area',
    'chapter',
    'date_month',
    'date_week',
    'date_day',
    'capacity',
    'tithe_money',
    'tithe_hq',
];

}
