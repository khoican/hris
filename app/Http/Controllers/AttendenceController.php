<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Office;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendenceController extends Controller
{
    public function index()
    {
        $id = Auth::user()->employee_id;

        $attendances = Attendence::where('employee_id', $id)->latest()->paginate(10);

        return view('pages.user.attendance', compact('attendances',));
    }

    private function harvesine($userLatitude, $userLongitude)
    {
        $office = Office::first();

        $radius = 6371000;
        $mainLatitude = $office->latitude;
        $mainLongitude = $office->longitude;

        $lat1 = deg2rad($mainLatitude);
        $lon1 = deg2rad($mainLongitude);

        $lat2 = deg2rad($userLatitude);
        $lon2 = deg2rad($userLongitude);

        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;

        $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $radius * $c;

        return $distance;
    }

    public function checkin(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $distance = $this->harvesine($latitude, $longitude);

        if ($distance <= 50) {

            $employee_id = 1;

            $existingAttendance = Attendence::where('employee_id', $employee_id)->whereDate('created_at', Carbon::today())->first();

            if ($existingAttendance) {
                return back()->with('error', 'You have already checked in today!');
            }

            Attendence::create([
                'employee_id' => $employee_id,
                'date' => Carbon::today(),
                'check_in' => now(),
            ]);

            return back()->with('success', 'You have successfully checked in!');
        } else {
            return back()->with('error', 'You are too far away from the office!');
        }
    }

    public function checkout(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $distance = $this->harvesine($latitude, $longitude);

        if ($distance <= 50) {

            $employee_id = 1;

            $existingCheckIn = Attendence::where('employee_id', $employee_id)->whereDate('check_in', Carbon::today())->first();

            if (!$existingCheckIn) {
                return back()->with('error', 'Kamu belum melakukan presensi masuk, silahkan checkin kembali!');
            }

            $employee  = Attendence::where('employee_id', $employee_id)->whereDate('created_at', Carbon::today())->first();
            $employee->update([
                'check_out' => now(),
            ]);

            return back()->with('success', 'You have successfully checked in!');
        } else {
            return back()->with('error', 'You are too far away from the office!');
        }
    }
}
