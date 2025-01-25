<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $applications = Application::with('job', 'user')->get();
        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        $jobs = Job::all();
        $users = User::all();
        return view('applications.create', compact('jobs', 'users'));
    }

    public function store(Request $request)
    {
        #\Log::info('Authenticated User ID: ' . Auth::id()); 
        #\Log::info('Request Data: ', $request->all()); 

        $request->validate([
            'applicant_name' => 'required|string|max:255',
            'job_id' => 'required|exists:jobs,id',
            'cover_letter' => 'required|string',
        ]);

        $user_id = Auth::id();

        \Log::info('Authenticated User ID: ' . $user_id);

        Application::create([
            'applicant_name' => $request->applicant_name,
            'job_id' => $request->job_id,
            'user_id' => $user_id,
            'cover_letter' => $request->cover_letter
        ]);

        return redirect()->route('applications.index')->with('success', 'Application submitted successfully.');
    }

    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
    }

    public function edit(Application $application)
    {
        $jobs = Job::all();
        $users = User::all();
        return view('applications.edit', compact('application', 'jobs', 'users'));
    }

    public function update(Request $request, Application $application)
    {
        $request->validate([
            'applicant_name' => 'required|string|max:255',
            'job_id' => 'required|exists:jobs,id',
            'cover_letter' => 'required|string',
        ]);

        $data = $request->only(['applicant_name', 'job_id', 'cover_letter']);
        $data['user_id'] = $application->user_id; // Za da zapazim tekushtoto id

        $application->update($data);

        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
