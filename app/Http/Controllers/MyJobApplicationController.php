<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        return view('my_job_application.index', [
            'applications' => auth()
                ->user()
                ->jobApplications()
                ->with('job.employer')
                ->get()
        ]);
    }


    public function destroy(string $id)
    {
        //
    }
}
