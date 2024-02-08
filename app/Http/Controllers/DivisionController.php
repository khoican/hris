<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DivisionController extends Controller
{
    public function index(): View {
        $divisions = Division::latest()->get();

        return view('pages.admin.division.index', compact('divisions'));
    }

    public function store(Request $request): RedirectResponse {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        Division::create([
            'name' => $request->name
        ]);

        return back();
    }

    public function update(Request $request, $id): RedirectResponse {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        $divisions = Division::find($id);

        $divisions->update([
            'name' => $request->name
        ]);

        return back();
    }

    public function destroy($id): RedirectResponse {
        $divisions = Division::find($id);
        $divisions->delete();
        return back();
    }
}