<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FarmProduce extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity', 'icon', 'production_level_id'];

    protected $with = 'productionLevel';

    public function productionLevel(): BelongsTo
    {
        return $this->belongsTo(ProductionLevel::class);
    }
}
