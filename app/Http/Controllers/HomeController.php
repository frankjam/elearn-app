<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Tymon\JWTAuth\JWTAuth;

class HomeController extends Controller
{


    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $courses = courses::get();
        $users = User::get();
        $roles = Role::pluck('name', 'name')->all();
        
        return view('welcome',compact('courses','users','roles'));
    }

  
    public function roleupdate(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);
    
        if ($request->roles) {
            $user->syncRoles($request->roles);
        }
        
        return $this->index();
    }
    
}
