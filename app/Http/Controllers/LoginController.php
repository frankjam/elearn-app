<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show(Request $request)
    {
        // check if user token is available 
        if (!empty(session('token'))) {
            try {
                // Use the retrieved token for authentication
                $user = JWTAuth::setToken(session('token'))->authenticate();
            } catch (Exception $e) {
                //JWTAuth::invalidate(JWTAuth::getToken());
                // Clear the session data
                $request->session()->flush();
                
                return redirect('/logout');
            }
            return redirect('/home');
        } else {
            return view('login');
        }
    }

    /**
     * Handle account login request
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);
        $email = request('email');
        $password = request('password');

        $user = DB::table('users')->where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Authentication successful
            if ($token = JWTAuth::attempt(['email' => $email, 'password' => $password])) {
                //store token in a sesion 
                session(['token' => $token]);
                //
                return redirect('/');
            }
        } else {
            // Authentication failed
            // You can handle failed login attempts here, such as showing an error message.
            return back()->withErrors(['message' => 'Invalid credentials']);
        }
    }

    public function logout(Request $request){
     
        JWTAuth::Invalidate();
       // session_destroy();
       $request->session()->flush();

        return redirect('login');
    }
}
