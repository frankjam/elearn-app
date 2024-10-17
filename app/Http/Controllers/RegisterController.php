<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // check if user token is available 
        if (!empty(session('token'))) {
            try {
                // Use the retrieved token for authentication
                $user = JWTAuth::setToken(session('token'))->authenticate();
            } catch (Exception $e) {
                return redirect('/logout');
            }
            return redirect('/');
        } else {

            //pass the user data to the 'register' view
            return view('register');
        }
    }

    /**
     * Handle account registration request
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        // Hash the password
        $hashedPassword = Hash::make($request->input('password'));
    
        $user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
        ]);
       // $user->assignRole('student');


        // Redirect to the 'login' page with a success message
        return redirect()->route('auth.login')->with('message', "Account successfully registered. Proceed to login");
    }
}
