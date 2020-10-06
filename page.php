<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

namespace App;

use Timber\Timber;
use App\Http\Controllers\Controller;
use App\PostTypes\Product;
use App\ViewModels\Products;
use Rareloop\Lumberjack\Page;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;

class PageController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();

        $context['post'] = $page;
        $context['title'] = $page->title;
        $context['content'] = $page->content;

        // Create a products view model with all products
        $context['products'] = new Products(Product::all());

        return new TimberResponse('templates/products-page.twig', $context);
    }
}
