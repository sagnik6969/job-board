<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = ['company_name', 'user_id'];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

// hasMany => Define a one-to-many relationship.
// hasOne => Define one to one relationship
// belongsTo => Define an inverse one-to-one or many relationship.

https: //stackoverflow.com/questions/37582848/what-is-the-difference-between-belongsto-and-hasone-in-laravel
