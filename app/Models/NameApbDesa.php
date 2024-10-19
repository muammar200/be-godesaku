<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NameApbDesa extends Model
{
    use HasFactory;

    protected $table = 'name_apb_desa';

    protected $fillable = ['category_apb_desa_id', 'name'];

    public function detailApbDesa(): HasMany
    {
        return $this->hasMany(DetailApbDesa::class);
    }

    public function categoryApbDesa(): BelongsTo
    {
        return $this->belongsTo(CategoryApbDesa::class);
    }
}
