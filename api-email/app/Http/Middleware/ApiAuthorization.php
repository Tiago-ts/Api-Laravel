<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Aplication;

class ApiAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $bearerToken = $request->bearerToken();

        if (!isset ($bearerToken) || is_null($bearerToken)){
            return response()->json(['message' => "Forbiden"], 403);
        }
        

        $aplication = Aplication::where('token', $bearerToken)->first();

        if (is_null($aplication)){
            return response()->json(['messaage' => 'Unauthorized'], 401);
        }
        $request->merge(['aplication_id'=> $aplication['id']]);

        return $next($request);
    }
}
