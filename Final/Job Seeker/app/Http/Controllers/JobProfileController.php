<?php

// app/Http/Controllers/ProfilesController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\JobProfile;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobProfileController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'CV' => ['required', 'regex:/^(https?:\/\/)?drive\.google\.com\/.*/'],
        'jobId' => ['required']
    ], [
        'CV.regex' => 'The CV link must be a Google Drive link.',
    ]);

    $user = Profile::where('userId', Auth::user()->id)->first();
    // $jobId = $request->route('upcvs');
    // echo $jobId;

    // Create a new instance of JobProfile
    $jobProfile = new JobProfile;

    // Set the properties individually
    $validatedData['nama'] = $user->nama; 
    $validatedData['profileId'] = $user->id;

    // Save the jobProfile
    JobProfile::create($validatedData);

}

    
}
