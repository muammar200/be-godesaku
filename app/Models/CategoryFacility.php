<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryFacility extends Model
{
    use HasFactory;

    protected $fillable = ['type_facility_id', 'name', 'icon'];

    public function typeFacility(): BelongsTo
    {
        return $this->belongsTo(TypeFacility::class);
    }

    public function fasilities(): HasMany
    {
        return $this->hasMany(Facility::class);
    }
}
