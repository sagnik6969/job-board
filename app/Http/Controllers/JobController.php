<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Job::class);
        $jobs = Job::with('employer');

        $jobs = $jobs->filter($request->only([
            'search',
            'min_salary',
            'max_salary',
            'experience',
            'category'
        ]))->get();

        return view('job.index', [
            'jobs' => $jobs
        ]);
    }




    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $this->authorize('view', $job);
        $job->load('employer.jobs');

        return view('job.show', [
            'job' => $job
        ]);
    }

}