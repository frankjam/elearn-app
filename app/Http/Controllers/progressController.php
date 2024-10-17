<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class progressController extends Controller
{
    public function __construct()
    {
     $this->middleware('permission:view-progress', ['only' => ['index']]);
      $this->middleware('permission:create-progress', ['only' => ['create','store']]);
       $this->middleware('permission:update-progress', ['only' => ['update','edit']]);
        $this->middleware('permission:delete-progress', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
