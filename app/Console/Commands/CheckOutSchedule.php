<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\Attendence;
use Illuminate\Console\Command;

class CheckOutSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-out-schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $time = now();
        $employees = Employee::all();

        foreach ($employees as $employee) {
            $attendance = Attendence::where('employee_id', $employee->id)->whereDate('date', $time->toDateString())->first();

            if (!$attendance) {
                Attendence::create([
                    'employee_id' => $employee->id,
                    'date' => $time->toDateString(),
                    'check_in' => null,
                    'check_out' => $time->toTimeString()
                ]);
            }
        }
    }
}
