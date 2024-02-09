<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function attendance() {
        return $this->hasMany(Attendence::class);
    }

    public function totalAttendanceDays($employee_id) {
        return $this->attendance()->where('employee_id', $employee_id)->whereNotNull('check_in')->count();
    }

    public function totalAbsenceDays($employee_id) {
        return $this->attendance()->where('employee_id', $employee_id)->whereNull('check_in')->count();
    }
}
