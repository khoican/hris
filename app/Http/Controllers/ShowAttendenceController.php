<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\AttendanceExports;
use Maatwebsite\Excel\Facades\Excel;

class ShowAttendenceController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        $attendanceSumary = [];
        foreach ($employees as $employee) {
            $attendanceSumary[] = [
                'employee' => $employee->name,
                'totalAttendanceDays' => $employee->totalAttendanceDays($employee->id),
                'totalAbsenceDays' => $employee->totalAbsenceDays($employee->id),
            ];
        }

        return view('pages.admin.attendence.index', compact('attendanceSumary'));
    }

    public function filter(Request $request)
    {
        $year = $request->year;
        $month = $request->month;

        $employees = Employee::all();

        $attendanceSumary = [];
        foreach ($employees as $employee) {
            $attendanceSumary[] = [
                'employee' => $employee->name,
                'totalAttendanceDays' => $employee->totalAttendanceDays($employee->id, $year, $month),
                'totalAbsenceDays' => $employee->totalAbsenceDays($employee->id, $year, $month),
            ];
        }

        return response()->json($attendanceSumary);
    }

    public function generateExcel(Request $request)
    {
        $employees = Employee::latest()->get();

        foreach ($employees as $employee) {
            $data[] = [
                'ID' => $employee->id,
                'Nama' => $employee->name,
                'Total Kehadiran' => $employee->totalAttendanceDays($employee->id),
                'Total Absen' => $employee->totalAbsenceDays($employee->id),
            ];
        }

        return Excel::download(new AttendanceExports($data), 'attendance.xlsx');
    }
}
