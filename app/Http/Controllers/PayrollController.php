<?php

namespace App\Http\Controllers;

use App\Exports\PayrollExport;
use App\Models\Payroll;
use App\Models\Employee;
use App\Models\Position;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

        return redirect('/gaji')->with('success', 'Data berhasil ditambahkan, Silahkan Cetak Slip Gaji!');
    }

    public function generateReport($id)
    {
        $payroll = Payroll::find($id);

        $data = [
            'payroll' => $payroll
        ];

        $pdf = app('dompdf.wrapper')->loadView('pages.admin.salary.report', $data)->setPaper('a4', 'portrait');
        return $pdf->download('slip_gaji.pdf');
    }

    public function history()
    {
        $payrolls = Payroll::all();
        return view('pages.admin.salary.history', compact('payrolls'));
    }

    public function payrollByUser()
    {
        $id = Auth()->user()->employee_id;
        $payrolls = Payroll::where('employee_id', $id)->get();

        return view('pages.user.salary', compact('payrolls'));
    }

    public function generateExcel()
    {
        return Excel::download(new PayrollExport, 'payroll.xlsx');
    }
}