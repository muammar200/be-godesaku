<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Birth extends Model
{
    use HasFactory;

    public function master_population(): BelongsTo
    {
        return $this->belongsTo(MasterPopulation::class);
    }
    // public function master_population(): HasOne
    // {
    //     return $this->hasOne(MasterPopulation::class, 'master_population_id', 'id');
    // }
}
