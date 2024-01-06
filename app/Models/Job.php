<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'experience',
        'category',
        'title',
        'location',
        'salary',
        'description',
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

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
                fn(Builder|QueryBuilder $q) =>
                $q->where('title', 'Like', "%" . $search . "%")
                    ->orWhere('description', 'Like', "%" . $search . "%")
                    ->orWhereHas(
                        'employer',
                        fn(Builder|QueryBuilder $q) =>
                        $q->where('company_name', 'LIKE', "%" . $search . "%")
                    )
                // orWhereHas => where condition for nested relationship => foreign key tables
            )
        );
        $query->when($min_salary, fn(Builder $q) => $q->where('salary', '>=', $min_salary));
        $query->when($max_salary, fn(Builder $q) => $q->where('salary', '<=', $max_salary));
        $query->when($experience, fn(Builder $q) => $q->where('experience', $experience));
        $query->when($category, fn(Builder $q) => $q->where('category', $category));

        return $query;
    }

    public function hasUserApplied(User|int $user): bool
    {
        return $this->where('id', $this->id)
            ->whereHas(
                'jobApplications',
                fn(Builder $query) => $query->where('user_id', $user->id ?? $user)
            )
            ->get()->count() != 0;
        // whereHas => used to perform queries on the nested tables.
    }

    // In PHP, you can use the arrow (->) or (::) syntax to call static methods, 
    // but accessing static properties should use the double-colon (::) syntax.
}
