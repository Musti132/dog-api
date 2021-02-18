<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBreed extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'breed_id'
    ];

    protected $table = "sub_breeds";

}
