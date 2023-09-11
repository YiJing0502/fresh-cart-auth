<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleWeight
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $weight): Response
    {
        // 寫法一（老師的方法）
        $user = $request->user();
        $userRole = $user?->user_role ?? 0;
        if (!str_contains($weight, strval($userRole))) {
            if ($userRole === 1) {
                return redirect(route('back.end.index'));
            }
            return redirect(route('front-index'));
        }
        return $next($request);


    }
}
