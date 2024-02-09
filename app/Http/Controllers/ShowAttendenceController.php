<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class ShowAttendenceController extends Controller
{
    public function index() {
        $employees = Employee::all();

        $attendanceSumary = [];
        foreach($employees as $employee) {
            $attendanceSumary[] = [
                'employee' => $employee->name,
                'totalAttendanceDays' => $employee->totalAttendanceDays($employee->id),
                'totalAbsenceDays' => $employee->totalAbsenceDays($employee->id),
            ];
        }

        return view('pages.admin.attendence.index', compact('attendanceSumary'));
    }
}
