<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public static $experiences = [
        'junior',
        'intermediate',
        'seiner'
    ];

    public static $category = [
        'IT',
        'Finance',
        'Production',
        'Sales'
    ];
}
