<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class AccessPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission = null, $guard = null): Response
    {

        $authGuard = app('auth')->guard($guard);

        if($authGuard->guest()){
            throw UnauthorizedException::notLoggedIn();
        }


        if($authGuard->user()->can($request->route()->getName())){
//            if user has permission, user can visit the page
            return $next($request);
        }else{
//            if donot have permission donot let enter to website
            abort(403, 'Unauthorized action.');
        }

        // throw UnauthorizedException::forPermissions($permissions);
    }
}
