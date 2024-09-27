<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs_advertisement';

    protected $guarded = [];

    const STATUS = [
        'open',
        'closed'
    ];
    const TYPE = [
        'full-time',
        'part-time',
        'internship'
    ];

    // Relations
    public function poster(): BelongsTo
    {
        return $this->belongsTo(User::class, 'posted_by', 'id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'job_id', 'id');
    }
}
