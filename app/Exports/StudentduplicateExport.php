<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\withHeadings;
use Illuminate\Support\Facades\DB;

class StudentduplicateExport implements FromCollection,withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array
    {
        return [
            'Id',
            'RegId',
            'name',
            'Department',
            'Gender',
            'Dob',
            'mobile',
            'address',
            'created_at',
            'updated_at',
        ];
    }

    public function collection()
    {
        $ids = Student::groupBy('id')->pluck('regid')->all();
		return Student::whereNotIn('regid',$ids)->get();
    }
}
