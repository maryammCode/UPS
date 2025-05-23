<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\XSSProtection::class,
        \App\Http\Middleware\FrameOptions::class,
        \App\Http\Middleware\AddHttpOnlyToXsrfToken::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\XSSProtection::class,
            \App\Http\Middleware\FrameOptions::class,
            \App\Http\Middleware\AddHttpOnlyToXsrfToken::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth_teacher' => \App\Http\Middleware\AuthenticateTeacher::class,
        'auth_personal' => \App\Http\Middleware\AuthenticatePersonal::class,
        'auth_student' => \App\Http\Middleware\AuthenticateStudent::class,
        'auth_company' => \App\Http\Middleware\AuthenticateCompany::class,
        'auth_alumni' => \App\Http\Middleware\AuthenticateAlumni::class,
        'auth_completed' => \App\Http\Middleware\AuthenticateCompleted::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'display' => \App\Http\Middleware\DisplayRoute::class,
        'CheckEntrepriseRole' => \App\Http\Middleware\CheckEntrepriseRole::class,
        'auth_magasinier' => \App\Http\Middleware\AuthenticateMagasinier::class,
        'auth_webmaster' => \App\Http\Middleware\AuthenticateWebmaster::class,
        'auth_magasinier_or_webmaster' => \App\Http\Middleware\AuthenticateMagasinierOrWebmaster::class,



    ];
}
