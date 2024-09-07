<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\AddCourse;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CourseExport implements FromCollection , WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return AddCourse::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'University Name',
            'Programme Name',
            'Ranking',
            'Level',
            'Course Ranking',
            'Tuition Fee',
            'Location',
            'Entry Requirement',
            'IELTS/TOEFL Requirement',
            'GRE/GMAT Requirement',
            'Application Open',
            'Application Deadline',
            'URL',
            'Title',
            'Name Location',
            'Study Mode',
        ];
    }
}
