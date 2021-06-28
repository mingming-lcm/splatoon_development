<?php

namespace App\Http\Middleware;

use App\Models\SystemSettings;
use Closure;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class SessionHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        date_default_timezone_set("Asia/Hong_Kong");

        return $next($request);
    }

    public function handleRegion($request)
    {
        date_default_timezone_set("Asia/Hong_Kong");
    }
}
