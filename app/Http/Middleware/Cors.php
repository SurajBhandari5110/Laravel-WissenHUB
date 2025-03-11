<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors {
    public function handle(Request $request, Closure $next) {
        $response = $next($request);

        // Set CORS headers
        $response->header('Access-Control-Allow-Origin', '*')
                 ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                 ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization');

        // Handle OPTIONS request for preflight
        if ($request->isMethod('OPTIONS')) {
            return response('', 200)->header('Access-Control-Allow-Origin', '*')
                                     ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                                     ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization');
        }

        return $response;
    }
}

