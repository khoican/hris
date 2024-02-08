<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Position;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PositionController extends Controller
{
    public function index():View {
        $positions = Position::with('division')->get();
        $divisions = Division::latest()->get();

        return view('pages.admin.position.index', compact('positions', 'divisions'));
    }

    public function store(Request $request): RedirectResponse {
        $this->validate(request(), [
            'division_id' => 'required',
            'name' => 'required',
            'salary_per_hour' => 'required',
        ]);

        Position::create([
            'division_id' => $request->division_id,
            'name' => $request->name,
            'salary_per_hour' => $request->salary_per_hour
        ]);

        return back();
    }

    public function update(Request $request, $id): RedirectResponse {
        $this->validate(request(), [
            'division_id' => 'required',
            'name' => 'required',
            'salary_per_hour' => 'required',
        ]);

        $positions = Position::find($id);

        $positions->update([
            'division_id' => $request->division_id,
            'name' => $request->name,
            'salary_per_hour' => $request->salary_per_hour,
        ]);

        return back();
    }

    public function destroy($id): RedirectResponse {
        $positions = Position::find($id);
        $positions->delete();
        return back();
    }
}