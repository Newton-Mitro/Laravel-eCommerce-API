<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($exception)
    {

        if ($exception instanceof ModelNotFoundException) {
            return new JsonResponse([
                'errors' => 'Model not found'
            ], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof NotFoundHttpException) {
            return  new JsonResponse([
                'errors' => 'Incorrect route'
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
