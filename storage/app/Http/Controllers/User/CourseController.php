<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddCourse;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function getCourse(Request $request, $name = null)
    {
        $country = $request->location ?? null;
        $level = $request->level ?? null;
        $programmename = $request->programmename ?? null;
        $query = AddCourse::query();
        if ($request->has('level') && !empty($request->level)) {
            $query->where('level', $request->level);
        }
        if ($request->has('location') && !empty($request->location)) {
            $query->where('location', $request->location);
        }
        if ($request->has('programmename') && !empty($request->programmename)) {
            $query->where('programmename', 'LIKE', '%' . $request->programmename . '%');
        }
        if (!empty($name)) {
            $query->where('level', 'LIKE', '%' . $name . '%');
        }
        $courses = $query->get();
        $totalCourses = $courses->count();
        if (!empty(Auth::id())) {
            $userId = auth()->user()->id;
            $wishlistCourseIds = Wishlist::where('userID', $userId)->pluck('courseId')->toArray();
            $courses->each(function ($course) use ($wishlistCourseIds) {
                $course->inWishlist = in_array($course->id, $wishlistCourseIds);
            });
        }
        $locations = AddCourse::select('location')->distinct()->pluck('location');
        $univeristies = AddCourse::select('universityname')->distinct()->pluck('universityname');
        $programs = AddCourse::select('programmename')->distinct()->pluck('programmename');
        $filters = [$request->level, $request->location, $request->programmename];
        if ($request->ajax()) {
            $htmlContent = view('courses._details', compact('courses'))->render();
            return response()->json(['html' => $htmlContent, 'totalCourses' => $totalCourses, 'filters' => $filters]);
        } else {
            return view('courses.index', compact('courses', 'locations', 'univeristies', 'programs', 'country', 'level', 'programmename'))->with('fragment', 'course_details_section');
        }
    }
    public function searchCourse(Request $request)
    {
        $query = AddCourse::query();
        if ($request->has('level') && !empty($request->level)) {
            $query->where('level', $request->level);
        }
        if ($request->has('country') && !empty($request->country)) {
            $query->where('country', $request->country);
        }
        if ($request->has('programmename') && !empty($request->programmename)) {
            $query->where('programmename', 'LIKE', '%' . $request->programmename . '%');
        }
        $courses = $query->get();
        $locations = AddCourse::select('location')->distinct()->pluck('location');
        $univeristies = AddCourse::select('universityname')->distinct()->pluck('universityname');
        $programs = AddCourse::select('programmename')->distinct()->pluck('programmename');
        if ($request->ajax()) {
            $htmlContent = view('courses._details', compact('courses'))->render();
            return response()->json(['html' => $htmlContent]);
        } else {
            return view('courses.index', compact('courses', 'locations', 'univeristies', 'programs'));
        }
    }
    public function getCourseDetails($id)
    {
        $course = AddCourse::find($id);
        return view('courses.details', compact('course'));
    }
    public function getFilteredDetails(Request $request)
    {
        $deadline = $request->ApplicationDeadline;
        $query = AddCourse::query();
        if ($request->has('tuitionfee') && !empty($request->tuitionfee)) {
            $tuitionFee = (int) $request->tuitionfee; // Convert to integer
            $query->where('tuitionfee', '<=', $tuitionFee);
        }
        foreach ($request->except(['levels', 'tuitionfee', 'ApplicationDeadline']) as $filter => $value) {
            if (!empty($value)) {
                $query->where($filter, $value);
            }
        }
        if ($request->has('levels') && !empty($request->levels)) {
            $query->whereIn('level', $request->levels);
        }

        if ($request->has('ApplicationDeadline') && !empty($request->ApplicationDeadline)) {
            $now = Carbon::now('UTC');
            $karachiOffset = Carbon::now('Asia/Karachi')->offsetHours;
            if ($deadline === 'open') {
                $query->where('ApplicationDeadline', '>', $now->copy()->addHours($karachiOffset));
            } elseif ($deadline === 'closed') {
                $query->where('ApplicationDeadline', '<', $now->copy()->addHours($karachiOffset));
            } elseif ($deadline === 'closing soon') {
                $query->where('ApplicationDeadline', '>', $now->copy()->addHours($karachiOffset))
                    ->where('ApplicationDeadline', '<', $now->copy()->addDays(21)->addHours($karachiOffset))
                    ->where('ApplicationDeadline', '>', $now->copy()->addDay()->addHours($karachiOffset));
            }
        }
        $filters = [$request->all()];
        $courses = $query->get();
        $totalCourses = $courses->count();
        $htmlContent = view('courses._details', compact('courses'))->render();
        return response()->json(['html' => $htmlContent, 'totalCourses' => $totalCourses, 'filters' => $filters]);
    }
    public function addCourseToWishlist(Request $request, $id)
    {
        if (empty(Auth::id())) {
            return response()->json(['message' => 'Please login first.']);
        }
        $course = AddCourse::find($id);
        if (!$course) {
            return response()->json(['message' => 'Wrong data provided.']);
        } else {
            $userId = Auth::id();
            $exists = Wishlist::where('userID', $userId)->where('courseId', $id)->exists();
            if ($exists) {
                return response()->json(['message' => 'Course already exists.']);
            }
            $data = $course->toArray();
            $data['userID'] = $userId;
            $data['courseId'] = $id;
            unset($data['id'], $data['EntryRequirement'], $data['studymode']);
            Wishlist::create($data);
            return response()->json(['message' => 'Course added to wishlist successfully. Go to dashbord to view your wishlist.']);
        }
    }
    public function removeFromWishlist($courseId)
    {
        $userId = Auth::id();
        $exists = Wishlist::where('userID', $userId)->where('courseId', $courseId)->first();
        if ($exists) {
            $exists->delete();
            return response()->json(['message' => 'Course is removed from wishlist.']);
        }
    }
}
