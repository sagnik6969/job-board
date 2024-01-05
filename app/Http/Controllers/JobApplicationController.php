<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        $this->authorize('apply', $job);
        return view('job_application.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Job $job)
    {
        $request->validate([
            'expected_salary' => 'required|numeric|min:1|max:10000000',
            'cv' => 'required|file|max:2048|mimes:pdf' //size in KB 
        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'private'); //private is defined in config/fileSystems.php
        // file is stored is the path defined there ('storage/app/private/cvs')

        JobApplication::create([
            'expected_salary' => $request->expected_salary,
            'user_id' => $request->user()->id,
            'job_id' => $job->id,
            'cv_path' => $path
        ]);

        return redirect()->route('jobs.show', ['job' => $job])->with('success', 'Application submitted successfully');

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
