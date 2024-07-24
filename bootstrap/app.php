<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'localhost/*',
            'http://localhost:8000/web/*',
            'http://localhost/web/*',
            'http://127.0.0.1:4040/web/*',
            'http://127.0.0.1:8000/web/*',
            'http://127.0.0.1/web/*',
            'https://9694-187-25-141-147.ngrok-free.app/web/*'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
