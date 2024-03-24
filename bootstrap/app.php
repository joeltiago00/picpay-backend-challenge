<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'trace' => $exception->getTrace()
            ],
                $exception->getCode() <= 0 || $exception->getCode() > 599
                    ? Response::HTTP_UNPROCESSABLE_ENTITY
                    : $exception->getCode() );
        });
    })->create();
