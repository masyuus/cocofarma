<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
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
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * When admin/backoffice users become unauthenticated (session expired),
     * redirect them to the backoffice login route (`/mimin`).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // Return JSON for AJAX/JSON requests
        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }

        // Determine guard (if any)
        $guards = $exception->guards();
        $guard = $guards[0] ?? null;

        // If this is the backoffice guard or a backoffice route, redirect to /mimin
        if ($guard === 'backoffice' || $guard === 'admin' || $this->isBackofficeRequest($request)) {
            // Prefer named route if available
            if (function_exists('route') && \Route::has('backoffice.login')) {
                return redirect()->guest(route('backoffice.login'));
            }

            return redirect()->guest('/mimin');
        }

        // Default to the main login route
        if (function_exists('route') && \Route::has('login')) {
            return redirect()->guest(route('login'));
        }

        return redirect()->guest('/login');
    }

    /**
     * Determine whether the incoming request targets the backoffice area.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function isBackofficeRequest(Request $request): bool
    {
        // Check route name prefix (e.g. backoffice.*)
        $route = $request->route();
        if ($route) {
            $name = $route->getName();
            if ($name && Str::startsWith($name, 'backoffice.')) {
                return true;
            }
        }

        // Check URI prefix
        if ($request->is('backoffice/*') || $request->is('mimin') || $request->is('mimin/*')) {
            return true;
        }

        return false;
    }
}
