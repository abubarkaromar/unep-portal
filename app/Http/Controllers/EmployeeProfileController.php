<?php

namespace App\Http\Controllers;

use App\Models\EmployeeProfile;
use Illuminate\Http\Request;

class EmployeeProfileController extends Controller
{
    public function index()
    {
        $profiles = EmployeeProfile::paginate(10);
        return view('employees.index', compact('profiles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'index_number' => 'required|unique:employee_profiles',
            'full_name' => 'required|string|max:255',
            'current_location' => 'required|string|max:255',
            'education_level' => 'required|string',
            'remote_work_available' => 'required|boolean',
            'software_expertise' => 'required|in:beginner,intermediate,expert',
            'languages_spoken' => 'required|array',
            'responsibility_level' => 'required|string',
        ]);

        $profile = EmployeeProfile::create($validated);
        return redirect()->route('employees.show', $profile)->with('success', 'Profile created successfully');
    }
}
