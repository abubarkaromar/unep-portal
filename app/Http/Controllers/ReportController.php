<?php

namespace App\Http\Controllers;

use App\Models\EmployeeProfile;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function generateStaffReport(Request $request)
    {
        $employees = EmployeeProfile::with(['schedules', 'user'])->get();
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="staff_report.csv"',
        ];
        
        $callback = function() use ($employees) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Name', 'Location', 'Skills', 'Languages', 'Total Hours']);
            
            foreach ($employees as $employee) {
                fputcsv($file, [
                    $employee->full_name,
                    $employee->current_location,
                    $employee->software_expertise,
                    implode(', ', $employee->languages_spoken),
                    $employee->schedules->sum('total_hours')
                ]);
            }
            
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
