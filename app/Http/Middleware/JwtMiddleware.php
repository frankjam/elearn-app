<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Retrieve the JWT token from the cookie
        //$jwtToken = Cookie::get('t_token');
        
        //retrieve jwt token from user session 
        $jwtToken = session('token');

        if (!$jwtToken) {
            //return response()->json(['error' => "unauthorized"], 401);
            // Redirect to the login page when the token is empty
            return redirect('/login');
        }

        try {
            // Use the retrieved token for authentication
            $user = JWTAuth::setToken($jwtToken)->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                //return response()->json(['status' => "invalid token "]);
                // Clear the session data
                $request->session()->flush();

                return redirect('/logout');
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                //return response()->json(['status' => 'Token is Expired']);
                // Clear the session data
                $request->session()->flush();
                
                return redirect('/logout');
            } else {
                //return response()->json(['status' => 'Authorization Token not found']);
                                // Clear the session data
                                $request->session()->flush();
                                return  redirect('/logout');
            }
        }
        
        return $next($request);
    }
}
