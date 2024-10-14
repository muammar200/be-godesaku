<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type_facility_id', 'category_facility_id', 'location', 'latitude', 'longitude'];

    public function typeFacility(): BelongsTo
    {
        return $this->belongsTo(TypeFacility::class);
    }

    public function categoryFacility(): BelongsTo
    {
        return $this->belongsTo(CategoryFacility::class);
    }
}
