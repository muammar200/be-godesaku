<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdmIndicatorCategory extends Model
{
    use HasFactory;

    public function idmIndicators(): HasMany
    {
        return $this->hasMany(IdmIndicator::class);
    }
}
