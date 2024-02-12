<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::latest()->get();
        $users = User::latest()->get();

        return view('pages.admin.employee.index', compact('employees', 'users'));
    }

    public function create()
    {
        $positions = Position::latest()->get();

        return view('pages.admin.employee.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'position_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Employee::create([
            'position_id' => $request->position_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $positions = Position::latest()->get();

        return view('pages.admin.employee.edit', compact('employee', 'positions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'position_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $employee = Employee::find($id);

        $employee->update([
            'position_id' => $request->position_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diubah');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus');
    }
}
