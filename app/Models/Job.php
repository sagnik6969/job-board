<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
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

    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        $search = $filters['search'] ?? null;
        $min_salary = $filters['min_salary'] ?? null;
        $max_salary = $filters['max_salary'] ?? null;
        $experience = $filters['experience'] ?? null;
        $category = $filters['category'] ?? null;

        $query->when(
            $search,
            fn(Builder $q) =>

            $q->where(
                fn($q) =>
                $q->where('title', 'Like', "%" . $search . "%")
                    ->orWhere('description', 'Like', "%" . $search . "%")
            )
        );
        $query->when($min_salary, fn(Builder $q) => $q->where('salary', '>=', $min_salary));
        $query->when($max_salary, fn(Builder $q) => $q->where('salary', '<=', $max_salary));
        $query->when($experience, fn(Builder $q) => $q->where('experience', $experience));
        $query->when($category, fn(Builder $q) => $q->where('category', $category));

        return $query;
    }
}
