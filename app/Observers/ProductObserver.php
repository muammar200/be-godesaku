<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product): void
    {
        $product->slug = str()->slug($product->name) . '-' . Str::random(6);
    }

    public function updating(Product $product): void
    {
        if ($product->isDirty('name')) {
            $product->slug = str()->slug($product->name) . '-' . Str::random(6);
        }
    }
}
