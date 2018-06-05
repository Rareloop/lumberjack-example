<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\QueryBuilder\Post;
use Timber\Image as TimberImage;
use App\PostTypes\Product;

class ProductType extends Post
{
    /**
     * Return the key used to register the post type with WordPress
     * First parameter of the `register_post_type` function:
     * https://codex.wordpress.org/Function_Reference/register_post_type
     *
     * @return string
     */
    public static function getPostType()
    {
        return 'app_product_type';
    }

    /**
     * Return the config to use to register the post type with WordPress
     * Second parameter of the `register_post_type` function:
     * https://codex.wordpress.org/Function_Reference/register_post_type
     *
     * @return array|null
     */
    protected static function getPostTypeConfig()
    {
        return [
            'labels' => [
                'name' => __('Product Types'),
                'singular_name' => __('Product Type')
            ],
            'public' => true,
        ];
    }

    public function products()
    {
        return Product::whereStatus('publish')
            ->whereMeta('product_type', $this->id, '=')
            ->orderByMeta('price', 'desc', 'numeric')
            ->limit(16)
            ->get();
    }
}
