<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function division() {
        return $this->belongsTo(Division::class);
    }

    public function employee() {
        return $this->hasMany(Employee::class);
    }
}