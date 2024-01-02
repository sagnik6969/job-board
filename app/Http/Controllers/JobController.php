<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $min_salary = $request->min_salary;
        $max_salary = $request->max_salary;

        // var_dump($search, $min_salary, $max_salary);

        // error_log(
        //     var_dump($request->search)
        // );

        $query = Job::query();

        $query->when($search, fn(Builder $q) => $q->where('title', 'Like', "%" . $search . "%"));
        $query->when($min_salary, fn(Builder $q) => $q->where('salary', '>=', $min_salary));
        $query->when($max_salary, fn(Builder $q) => $q->where('salary', '<=', $max_salary));

        $jobs = $query->get();

        return view('job.index', [
            'jobs' => $jobs
        ]);
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
    public function show(Job $job)
    {
        return view('job.show', [
            'job' => $job
        ]);
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
