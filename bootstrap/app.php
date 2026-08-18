<?php

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->respond(function (Response $response, Throwable $exception, Request $request) {
            $status = $response->getStatusCode();
            
            // Mostrar 404 siempre. Mostrar 500, 503, 403 solo en producción (para no perder el stack trace de Ignition en local)
            if ($status === 404 || (!app()->environment(['local', 'testing']) && in_array($status, [500, 503, 403]))) {
                $page = $status === 404 ? '404' : '500';
                return Inertia::render("Error/{$page}", ['status' => $status])
                    ->toResponse($request)
                    ->setStatusCode($status);
            } elseif ($status === 419) {
                return back()->with([
                    'message' => 'La página ha expirado, por favor intenta de nuevo.',
                ]);
            }

            return $response;
        });

        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
