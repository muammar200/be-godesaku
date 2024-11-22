<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdmIndicator extends Model
{
    use HasFactory;

    protected $with = ['idmIndicatorCategory', 'activityImplementers'];

    public function idmIndicatorCategory(): BelongsTo
    {
        return $this->belongsTo(IdmIndicatorCategory::class);
    }

    public function activityImplementers(): HasMany
    {
        return $this->hasMany(ActivityImplementer::class);
    }
}
