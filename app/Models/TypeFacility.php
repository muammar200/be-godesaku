<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeFacility extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon'];

    public function categoryFacilities(): HasMany
    {
        return $this->hasMany(CategoryFacility::class);
    }
}
