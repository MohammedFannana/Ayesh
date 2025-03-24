<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

         // to prevent user enter dashboard

        $user = $request->user();

         // if not login
        if (!$user) {
            return redirect()->route('login');
        }

        // if user error not progress
        if ($user->type != 'admin') {
            abort(403);
        }

        if($user->type == 'admin'){
            return $next($request);
        }
    }
}
