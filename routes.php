<?php

use Rareloop\Lumberjack\Facades\Router;
use Zend\Diactoros\Response\HtmlResponse;

Router::post('products/{id}/comments', '\App\Http\Controllers\ProductCommentController@store');
