<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Insurance;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $salary = Position::all();

        return view('pages.admin.salary.index', compact('employees', 'salary'));
    }

    public function create($id)
    {
        $employee = Employee::find($id);
        $insurances = Insurance::all();

        return view('pages.admin.salary.store', compact('employee', 'insurances'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'basic_salary' => 'required',
            'tax' => 'required',
            'insurance' => 'required',
            'debt'
        ]);

        $employee = Employee::find($id);
        $insurances = Insurance::where('id', $request->insurance)->first();

        $salary = $request->basic_salary - $request->tax - $insurances->cost - $request->debt;

        Payroll::create([
            'employee_id' => $employee->id,
            'name' => $request->name,
            'position' => $request->position,
            'basic_salary' => $request->basic_salary,
            'tax' => $request->tax,
            'insurance' => $insurances->name,
            'insurance_cost' => $insurances->cost,
            'debt' => $request->debt,
            'salary' => $salary
        ]);

        return back()->with('success', 'Data berhasil ditambahkan, Silahkan Cetak Slip Gaji!');
    }
}
