<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class RedirectIf404
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response->status() == 404) {
            return redirect()->route('login.index'); // Change 'login.index' to your actual login route name
        }

        return $response;
    }
}
