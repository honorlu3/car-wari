<?php

namespace App\Http;


use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Los middleware globales de la aplicación.
     *
     * Estos middleware se ejecutan durante cada solicitud HTTP a tu aplicación.
     */
    protected $middleware = [
        // Manejo de proxies (como Cloudflare)
        \App\Http\Middleware\TrustProxies::class,

        // Permite manejar mantenimiento (modo down)
        \Illuminate\Http\Middleware\HandlePrecognitiveRequests::class,

        // Protege contra ataques XSS
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,

        // Verifica si la aplicación está en mantenimiento
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // Limita el tamaño de los POST
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        // Maneja la confianza en proxies
        \Illuminate\Http\Middleware\TrustHosts::class,
    ];

    /**
     * Los grupos de middleware de la aplicación.
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // Middleware para compartir errores con las vistas
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Control de frecuencia para peticiones API
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Los middleware de ruta individuales.
     *
     * Estos pueden asignarse a rutas o grupos manualmente.
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // ✅ Tus middlewares personalizados
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
        'is_user' => \App\Http\Middleware\IsUser::class,
    ];
}
