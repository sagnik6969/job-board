<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        return view('my_job_application.index', [
            'applications' => auth()
                ->user()
                ->jobApplications()
                ->with([
                    'job' => fn($query) => $query
                        ->withCount('jobApplications')
                        ->withAvg('jobApplications', 'expected_salary')
                        ->withTrashed()
                    // To load soft deleted records
                    ,
                    'job.employer'
                    // This is how to run nested queries on nested tables
                ])
                ->get()
        ]);
    }


    public function destroy(JobApplication $my_job_application)
    {
        // $my_job_application => for route model binding this name must be equal to the name specified 
        // in the php artisan route:list

        $my_job_application->delete();

        return redirect()->back()->with('success', 'Application cancelled successfully!');
    }
}
