<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::latest()->get();

        return view('pages.admin.insurance.index', compact('insurances'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cost' => 'required'
        ]);

        Insurance::create([
            'name' => $request->name,
            'cost' => $request->cost
        ]);

        return back()->with('success', 'Data Asuransi Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'cost' => 'required'
        ]);

        $insurance = Insurance::find($id);

        $insurance->update([
            'name' => $request->name,
            'cost' => $request->cost
        ]);

        return back()->with('success', 'Data Asuransi Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $insurance = Insurance::find($id);
        $insurance->delete();

        return back()->with('success', 'Data Asuransi Berhasil Dihapus');
    }
}
