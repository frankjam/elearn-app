<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtRefreshTokenMiddleware extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
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

            // If authentication is successful, check if the token needs refreshing
            $token = JWTAuth::getToken();

            $refreshedToken = JWTAuth::refresh($token);

            // Attach the refreshed token to the response headers
            session(['token' => $refreshedToken]);

            return  $next($request);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            // Clear the session data
            $request->session()->flush();
            return redirect('/logout');
            // return response()->json(['error' => 'Token has expired'], 401);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            // Clear the session data
            $request->session()->flush();
            return redirect('/logout');
            // return response()->json(['error' => 'Token is invalid'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            // Clear the session data
            $request->session()->flush();
            return redirect('/logout');
            //return response()->json(['error' => 'Token is absent'], 401);
        }

        // If none of the above conditions are met, something went wrong
        // return response()->json(['error' => 'Unauthorized'], 401);
        // Clear the session data
        $request->session()->flush();
        return redirect('/logout');
    }
}
