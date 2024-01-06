<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
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
            'jobs' => auth()->user()->employer->jobs()->with('employer', 'jobApplications.user')->get()
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
    public function store(JobRequest $request)
    {

        auth()
            ->user()
            ->employer
            ->jobs()
            ->create($request->validated());

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
    public function edit(Job $my_job)
    {
        return view('my_job.edit', ['job' => $my_job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $my_job)
    {
        $my_job->update($request->validated());

        return redirect()
            ->route('my_jobs.index')
            ->with('success', 'Job updated successfully!');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
