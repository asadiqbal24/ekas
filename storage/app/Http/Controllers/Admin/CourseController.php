<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    public function index()
    {
        $course = '';
        $heading = 'Add Courses';
        $sub_heading = 'You can add courses here';
        return view('admin.courses.add', compact('heading', 'sub_heading', 'course'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'universityname' => 'required',
                'programmename' => 'required',
                'ranking' => 'required',
                'level' => 'required',
                'courseranking'    => 'required',
                'tuitionfee'    => 'required',
                'location'    => 'required',
                'EntryRequirement'    => 'required',
                'IELTSTOFELRequirement'    => 'required',
                'GREGMATSATRequirement'    => 'required',
                'Applicationopen' => 'required',
                'ApplicationDeadline' => 'required',
                'URL' => 'required',
                'title' => 'required',
                'namelocation' => 'required',
                'studymode' => 'required',
            ]
        );
        AddCourse::create($request->all());
        return redirect()->back()->with('message', 'Course added successfully.');
    }
    public function getAllCourses()
    {
        $courses = AddCourse::select('id', 'universityname', 'programmename', 'ranking', 'location')->get();
        return view('admin.courses.index', compact('courses'));
    }
    public function getOneCourse($id)
    {
        $course = AddCourse::find($id);
        return response()->json(['data' => $course]);
    }
    public function edit($id)
    {
        $course = AddCourse::find($id);
        $heading = 'Edit Course';
        $sub_heading = 'You can edit Courses here';
        return view('admin.courses.update', compact('course', 'heading', 'sub_heading'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'universityname' => 'required',
                'programmename' => 'required',
                'ranking' => 'required',
                'level' => 'required',
                'courseranking'    => 'required',
                'tuitionfee'    => 'required',
                'location'    => 'required',
                'EntryRequirement'    => 'required',
                'IELTSTOFELRequirement'    => 'required',
                'GREGMATSATRequirement'    => 'required',
                'Applicationopen' => 'required',
                'ApplicationDeadline' => 'required',
                'URL' => 'required',
                'title' => 'required',
                'namelocation' => 'required',
                'studymode' => 'required',
            ]

        );
        $course = AddCourse::find($id);
        $course->update($request->all());
        return redirect()->back()->with('message', 'Course updated successfully.');
    }
 
    public function delete($id)
    {
        AddCourse::find($id)->delete();
        return redirect()->back()->with('message', 'Course deleted successfully.');
    }
}
