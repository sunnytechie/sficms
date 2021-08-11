<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'avatar',
        'name',
        'email',
        'external_id',
        'address',
        'phone',
        'birthdate',
        'state',
        'marital_status',
        'country',
        'contact',
        'sex',
        'about',
        'health',
        'positon',
        'department',
        'unit',
        'unit_head',
        'office_building',
        'supervisor_name',
        'nextkin_name',
        'nextkin_address',
        'nextkin_phone',
        'nextkin_country',
        'nextkin_email',
        'nextkin_state',
        'nextkin_relationship',
        'nextkin_sex',
    ];
}
