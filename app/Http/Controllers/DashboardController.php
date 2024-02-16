<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Division;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();
        $divisions = Division::all();

        $totalEmployees = $employees->count();
        $totalDivisions = $divisions->count();

        if ($employees->count() > 0) {
            $totalAttendances = Attendence::whereNotNull('check_in')->where('date', Carbon::now()->format('Y-m-d'))->count() / $employees->count() * 100;
        } else {
            $totalAttendances = 0;
        }

        return view('pages.admin.dashboard', compact('totalEmployees', 'totalDivisions', 'totalAttendances', 'employees'));
    }
}
