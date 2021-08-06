<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    
}
