<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;

class AttendanceExports implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAMA',
            'TOTAL KEHADIRAN',
            'TOTAL ABSEN',
        ];
    }
}
