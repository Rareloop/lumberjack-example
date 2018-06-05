<?php

/**
 * The Template for displaying all single posts
 */

namespace App;

use Timber\Timber;
use Rareloop\Lumberjack\Post;
use App\PostTypes\ProductType;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;

class SingleAppProductTypeController
{
    public function handle()
    {
        $context = Timber::get_context();
        $productType = new ProductType();

        $context['post'] = $productType;
        $context['title'] = $productType->title;
        $context['content'] = $productType->content;

        // Create a products view model for this product type
        $context['products'] = Products::forProductType($productType);

        return new TimberResponse('templates/generic-page.twig', $context);
    }
}
