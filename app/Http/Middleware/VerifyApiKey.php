<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserToken;

class VerifyApiKey
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
        $userToken = UserToken::whereToken($request->header('Authorization'))->first();

        if(!$request->header('Authorization') || empty($userToken))
        {
            return response()->json([
                'success' => false,
                'message' => 'Illegal Access',
            ], 403, [
                'Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'
            ], JSON_UNESCAPED_UNICODE);
        }

        return $next($request);
    }
}
