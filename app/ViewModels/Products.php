<?php

namespace App\ViewModels;

use App\PostTypes\Product;
use App\PostTypes\ProductType;
use Rareloop\Lumberjack\ViewModel;
use Tightenco\Collect\Support\Collection;

class Products extends ViewModel
{
    public function __construct(Collection $products)
    {
        $this->products = $products->map(function ($product) {
            // $product here is an instance of `App\PostTypes\Product`
            return [
                'image' => $product->photo()->src('product-photo'),
                'title' => $product->title,
                'price' => $product->price(),
                'permalink' => $product->link(),
            ];
        })->toArray();
    }

    public static function forProductType(ProductType $productType)
    {
        $products = $productType->products();

        return new static($products);
    }

    public function toArray() : array
    {
        return $this->products;
    }
}
