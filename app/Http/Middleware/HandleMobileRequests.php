<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class HandleMobileRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        // Check if this is a mobile request
        $isMobile = isset($_SERVER['IS_MOBILE']) || $request->cookie('is_mobile') === '1';

        if ($isMobile) {
            // Add mobile flag to the view data
            app('view')->share('isMobile', true);

            // Force non-cached responses for mobile
            $response = $next($request);

            // Ensure content type is correctly set for HTML responses
            if ($response instanceof Response &&
                !$response->headers->has('Content-Type') &&
                $response->getContent() &&
                is_string($response->getContent()) &&
                str_contains($response->getContent(), '<html')) {
                $response->headers->set('Content-Type', 'text/html; charset=UTF-8');
            }

            return $response;
        }

        return $next($request);
    }
}
