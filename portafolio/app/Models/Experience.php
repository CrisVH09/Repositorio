<?php

namespace App\Models;

use Database\Factories\ExperienceFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'role',
    'company',
    'company_url',
    'location',
    'description',
    'highlights',
    'tech_stack',
    'started_at',
    'ended_at',
])]
class Experience extends Model
{
    /** @use HasFactory<ExperienceFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'highlights' => 'array',
            'tech_stack' => 'array',
            'started_at' => 'date',
            'ended_at' => 'date',
        ];
    }

    /**
     * Determine whether this is the current position.
     *
     * @return Attribute<bool, never>
     */
    protected function isCurrent(): Attribute
    {
        return Attribute::get(fn (): bool => $this->ended_at === null);
    }

    /**
     * Scope a query to show current positions first, then the most recent ones.
     *
     * @param  Builder<Experience>  $query
     */
    #[Scope]
    protected function mostRecentFirst(Builder $query): void
    {
        $query->orderByRaw('ended_at is not null')->latest('started_at');
    }
}
