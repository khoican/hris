<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $office = Office::first();

        return view('pages.admin.office.index', compact('office'));
    }

    public function create()
    {
        return view('pages.admin.office.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        Office::create([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return redirect('kantor')->with('success', 'Berhasil Menambah Data Kantor');
        return redirect('kantor/show')->with('error', 'Gagal Menambah Data Kantor');
    }

    public function edit($id)
    {
        $office = Office::find($id);

        return view('pages.admin.office.edit', compact('office'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $office = Office::find($id);

        $office->update([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return redirect('kantor')->with('success', 'Berhasil Mengubah Data Kantor');
    }
}
