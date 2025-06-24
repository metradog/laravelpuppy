<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
//use App\Http\Middleware\Acceso;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // Registrar los middleware de la aplicación globalmente (incluyendo login y todo, asi que hay que tener cuidado con el orden)
        //$middleware->append(Acceso::class);
       
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
