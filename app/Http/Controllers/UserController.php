<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function index()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->role === 'admin') {
                return redirect('/admin');
            } else if ($user->role === 'user') {
                return redirect('/');
            }
        }

        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('name', 'password');

        if (Auth::attempt($credential)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin');
            } else if ($user->role === 'user') {
                return redirect('/');
            }

            return redirect('/');
        }

        return redirect('login')->withInput()->withErrors(['login-gagal' => 'Username atau Password salah!']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        Auth::logout();
        return redirect('login');
    }
}
