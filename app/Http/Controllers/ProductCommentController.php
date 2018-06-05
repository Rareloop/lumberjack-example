<?php

namespace App\Http\Controllers;

use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\JsonResponse;
use App\Exceptions\CannotSaveAnEmptyComment;

class ProductCommentController
{
    public function store($productId, ServerRequest $request)
    {
        $content = json_decode($request->getBody(), true);

        if (empty($content['comment'])) {
            throw new CannotSaveAnEmptyComment;
        }

        $user = wp_get_current_user();

        wp_new_comment([
            'comment_post_ID' => (int)$productId,
            'comment_author' => $user->ID,
            'comment_content' => $comment,
            'user_id' => $user->ID,
            'comment_author_email' => null,
            'comment_author_url' => null,
            'comment_type' => '',
            'comment_parent' => 0,
        ]);

        return new JsonResponse([
            'data' => [
                'content' => $comment,
                'author' => $user->display_name,
            ]
        ], 201);
    }
}
