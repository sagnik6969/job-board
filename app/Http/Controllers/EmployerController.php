<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    function __construct()
    {
        $this->authorizeResource(Employer::class);
    }


    public function create()
    {
        return view('employer.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|unique:employers,company_name'
            // unique employers table company name column 
        ]);

        $request->user()->employer()->create([
            'company_name' => $request->company_name
        ]);

        return redirect()
            ->route('jobs.index')
            ->with('success', 'You have successfully registered as an employer');
    }


}
