<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\Request;
use App\Exceptions\ExceptionTrait;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{

    use ExceptionTrait;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Exception $exception, $request) {
            if ($request->expectsJson()) {
                // $this->apiException($exception);
                if ($exception instanceof ModelNotFoundException) {
                    return response()->json([
                        'errors' => 'Model not found'
                    ], Response::HTTP_NOT_FOUND);
                }

                if ($exception instanceof NotFoundHttpException) {
                    return response()->json([
                        'errors' => 'Route not found'
                    ], Response::HTTP_NOT_FOUND);
                }
            }
        });
    }
}
