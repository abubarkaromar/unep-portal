<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Notifications\ScheduleUpdated;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('employee')->paginate(15);
        return view('schedules.index', compact('schedules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employee_profiles,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'shift_type' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $schedule = Schedule::create($validated);
        $schedule->employee->user->notify(new ScheduleUpdated($schedule));

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully');
    }
}
