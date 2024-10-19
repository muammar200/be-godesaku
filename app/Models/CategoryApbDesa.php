<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryApbDesa extends Model
{
    use HasFactory;

    protected $table = 'category_apb_desa';

    protected $fillable = ['category_apb_desa_id', 'name'];

    public function nameApbDesa(): HasMany
    {
        return $this->hasMany(NameApbDesa::class);
    }
}
