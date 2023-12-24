<?php

// app/Http/Controllers/ProfilesController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nomor_telp' => 'required|string',
            'umur' => 'required|integer',
            'gender' => 'required|in:male,female',
            'desc_self' => 'required|string',
            'skill' => 'required|string',
        ]);

        // Add userId to the validated data
        $validatedData['userId'] = Auth::user()->id;

        // Check if a profile with the userId already exists
        $existingProfile = Profile::where('userId', $validatedData['userId'])->first();

        // If an existing profile is found, update it; otherwise, create a new profile
        if ($existingProfile) {
            $existingProfile->update($validatedData);
        } else {
            Profile::create($validatedData);
        }

        // Redirect or return a response as needed
        return redirect()->route('profile');
    }

}

