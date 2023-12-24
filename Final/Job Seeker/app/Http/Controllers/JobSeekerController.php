<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Profile;
use App\Models\JobProfile;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    public function home() {
        $jobs = Job::all();

        return view('home', compact('jobs'));
        // return view("home");
    }

    public function profile() {
        $user = Profile::where('userId', Auth::user()->id)->first();
        $applied = null;
        $job = null;
    
        if (!is_null($user)) {
            // If $user is not null, proceed to fetch $applied and $job
            $applied = JobProfile::where('profileId', $user->id)->first();
    
            if (!is_null($applied)) {
                // If $applied is not null, fetch $job
                $job = Job::where('id', $applied->jobId)->first();
            }
        }
    
        return view("profile", compact('user', 'applied', 'job'));
    }
    
    public function apply(Request $request) {
            $joobId = $request->route('jobId');
            // Use $parameterValue as needed
            $job = Job::where("id", $joobId)->first();
        
        return view('applyJob', compact('job'));
    }

    public function upcv() {
        return view('upcv');
    }
}