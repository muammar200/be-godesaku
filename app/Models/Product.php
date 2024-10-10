<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'rate', 'sold_quantity', 'price', 'image', 'whatsapp_contact'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
