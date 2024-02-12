<?php

namespace App\Models;

use Carbon\Carbon;
use App\Events\EmployeeCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'employee_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendence::class);
    }

    public function totalAttendanceDays($employee_id, $year = null, $month = null)
    {
        $year = $year ?? Carbon::now()->year;
        $month = $month ?? Carbon::now()->month;
        return $this->attendance()->where('employee_id', $employee_id)->whereNotNull('check_in')->whereYear('date', $year)->whereMonth('date', $month)->count();
    }

    public function totalAbsenceDays($employee_id, $year = null, $month = null)
    {
        $year = $year ?? Carbon::now()->year;
        $month = $month ?? Carbon::now()->month;
        return $this->attendance()->where('employee_id', $employee_id)->whereNull('check_in')->whereYear('date', $year)->whereMonth('date', $month)->count();
    }
}
