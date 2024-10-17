<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *  **Content Management:**
 *    - Instructors should be able to upload course materials (videos, documents).
 *    - Students should be able to access course materials once enrolled in a course.
 */

class contentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-content', ['only' => ['index','show']]);
        $this->middleware('permission:create-content', ['only' => ['create','store']]);
        $this->middleware('permission:update-content', ['only' => ['update','edit']]);
        $this->middleware('permission:delete-content', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.create');
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
        return view('content.edit');
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
