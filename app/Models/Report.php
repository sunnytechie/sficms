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
        
        # 'chapter1',
        # 'chapter2',
        # 'chapter3',
        # 'chapter4',
        # 'chapter5',
        # 'chapter6',
        # 'chapter7',
        # 'chapter8',
        # 'chapter9',
        # 'chapter10',
        # 'chapter11',
        # 'chapter12',
        # 'day1',
        # 'day2',
        # 'day3',
        # 'day4',
        # 'day5',
        # 'day6',
        # 'day7',
        # 'day8',
        # 'day9',
        # 'day10',
        # 'day11',
        # 'day12',
        # 'capacity1',
        # 'capacity2',
        # 'capacity3',
        # 'capacity4',
        # 'capacity5',
        # 'capacity6',
        # 'capacity7',
        # 'capacity8',
        # 'capacity9',
        # 'capacity10',
        # 'capacity11',
        # 'capacity12',
        # 'income1',
        # 'income2',
        # 'income3',
        # 'income4',
        # 'income5',
        # 'income6',
        # 'income7',
        # 'income8',
        # 'income9',
        # 'income10',
        # 'income11',
        # 'income12',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
