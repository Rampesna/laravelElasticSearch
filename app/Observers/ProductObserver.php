<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function created(Product $product)
    {
        app('elasticsearch')->index([
            'index' => 'products',
            'id' => $product->id,
            'body' => $product->toElasticsearchArray(),
        ]);
    }

    public function updated(Product $product)
    {
        app('elasticsearch')->index([
            'index' => 'products',
            'id' => $product->id,
            'body' => $product->toElasticsearchArray(),
        ]);
    }

    public function deleted(Product $product)
    {
        app('elasticsearch')->delete([
            'index' => 'products',
            'id' => $product->id,
        ]);
    }

    public function restored(Product $product)
    {
        app('elasticsearch')->index([
            'index' => 'products',
            'id' => $product->id,
            'body' => $product->toArray(),
        ]);
    }
}
