<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddCourse;
use Illuminate\Http\Request;

class DataExportController extends Controller
{
    public function export()
    {
        return AddCourse::all();
    }
}
