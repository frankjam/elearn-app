<?php

namespace App\Http\Controllers;

use App\Models\content;
use App\Models\courses;
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
        $courses = courses::get();
        return view('courses.index',compact('courses'));
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
        $request->validate([
            'name' => 'required',
        ]);

        courses::create($request->all());

        $courses = courses::get();
        return view('courses.index',compact('courses'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contents = content::where("course_id",$id)->get();

        return view('courses.show', compact('contents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = courses::where("id",$id)->first();
        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Specify string type and limit the length
            'status' => 'required', 
        ]);
    
        // Find the course by ID, or fail if not found
        $course = Courses::findOrFail($id);
    
        // Update the course with validated data
        $course->update($validatedData);
        
        // Return the index view 
        return $this->index(); 
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = courses::where("id",$id)->first();
        $course->delete();
        
        return $this->index();
    }
}
