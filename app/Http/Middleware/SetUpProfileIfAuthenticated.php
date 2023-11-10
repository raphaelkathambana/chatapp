<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetUpProfileIfAuthenticated
{
    /**
     * Redirects you to Set Avatar Page once Authenticated to set up your profile.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && ! $request->user()->has_set_up_profile) {
            return redirect()->route('SetAvatar');
        }
        return $next($request);
    }
}
