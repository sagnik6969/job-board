<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_job.index', [
            // 'jobs' => auth()->user()->employer->jobs
            // remember ()=> converts to query. and without parenthesis simply 
            // fetches the model from db.
            'jobs' => auth()->user()->employer->jobs()->with('employer','jobApplications.user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'experience' => 'required|in:' . implode(',', Job::$experiences),
            'category' => 'required|in:' . implode(',', Job::$category),
            'title' => 'required|string|min:3|max:256',
            'location' => 'required|string',
            'salary' => 'required|numeric',
            'description' => 'required|string',

        ]);

        auth()->user()->employer->jobs()->create([
            ...$validatedData
        ]);

        return redirect()->route('my_jobs.index')->with('success', 'Job created successfully');

        // dd(request()->all());
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
