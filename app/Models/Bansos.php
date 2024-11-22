<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bansos extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'icon'];

    public function bansosReceivers(): HasMany
    {
        return $this->hasMany(BansosReceiver::class);
    }
}
