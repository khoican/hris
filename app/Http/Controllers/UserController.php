<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store($id)
    {
        $employee = Employee::find($id);
        $username = strtolower(str_replace(' ', '', $employee->name));

        if (strtolower($employee->position->division->name) == 'human resources') {
            User::create([
                'employee_id' => $employee->id,
                'name' => $username,
                'password' => bcrypt($username),
                'role' => 'admin'
            ]);
        } else {
            User::create([
                'employee_id' => $employee->id,
                'name' => $username,
                'password' => bcrypt($username),
                'role' => 'user'
            ]);
        }

        return back()->with('success', 'Berhasil Menambah Data User');
    }
}
