<?php

namespace App\PostTypes;

use Rareloop\Lumberjack\Post;
use Timber\Image as TimberImage;

class Product extends Post
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
        return 'app_product';
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
                'name' => __('Products'),
                'singular_name' => __('Product')
            ],
            'public' => true,
        ];
    }

    public function price()
    {
        return get_field('price', $this->id);
    }

    public function photo() : TimberImage
    {
        return new TimberImage(get_field('photo', $this->id));
    }
}
