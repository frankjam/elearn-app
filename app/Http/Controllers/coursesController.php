<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/***
 * **Course Management:**
   - Instructors should be able to create new courses, update existing courses, and delete courses they own.
   - Additionally each course has to have a status which is set to 'Pending' on Creation and will have to go through an approval(done by a user with the 'approver' Role the status now changes to 'Approved'
   - Students should be able to view  Approved available courses, enroll in courses, and view enrolled courses.

 */


class coursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view-course', ['only' => ['index','show']]);
        $this->middleware('permission:create-course', ['only' => ['create','store']]);
        $this->middleware('permission:update-course', ['only' => ['update','edit']]);
        $this->middleware('permission:delete-course', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
