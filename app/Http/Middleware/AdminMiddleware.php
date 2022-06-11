<?php

namespace App\Http\Middleware;

use App\Models\Enum\User\UserRoleEnum;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->hasRole(UserRoleEnum::ADMIN)) {
            return redirect('/');
        }
        return $next($request);
    }
}
