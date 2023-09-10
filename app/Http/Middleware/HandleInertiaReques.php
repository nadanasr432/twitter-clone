<?php

namespace App\Http\Middleware;
use Inertia\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
    
class HandleInertiaRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            
               'unreadNotificationsCount'=>$request->user()->unreadNotifications()->count()
        ]);
            
            
    }
}
