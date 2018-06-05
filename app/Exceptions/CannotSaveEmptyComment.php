<?php

namespace App\Exceptions;

use Zend\Diactoros\Response\JsonResponse;
use Rareloop\Lumberjack\Contracts\Responsable;

class CannotSaveAnEmptyComment extends \Exception implements Responsable
{
    public function toResponse()
    {
        return new JsonResponse([
            'errors' => [
                [
                    'code' => 'ERR-400',
                    'title' => class_basename($this),
                    'details' => 'You cannot save an empty comment',
                ],
            ]
        ], 400);
    }
}
