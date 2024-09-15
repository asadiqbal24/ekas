<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddCourse;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class CourseController extends Controller
{



    
    
    
    public function getCoursesearch(Request $request, $location = null, $level = null, $programmename = null)
{
    // Retrieve query parameters from the request if not passed via route
    $location = $location ?? $request->input('location');
    $level = $level ?? $request->input('level');
    $programmename = $programmename ?? $request->input('programmename');

    $query = AddCourse::query();

    if (!empty($location) && $location !== 'All') {
        $query->where('country', $location);
    }

    if (!empty($level) && $level !== 'All') {
        $query->where('level', $level);
    }

    if (!empty($programmename)) {
        $query->where('title', 'like', '%' . $programmename . '%');
    }

    // Get the results of the query
    $courses = $query->get();

    $TotalCountCourses = AddCourse::get()->count();
    if (!empty(Auth::id())) {
        $userId = auth()->user()->id;
        $wishlistCourseIds = Wishlist::where('userID', $userId)->pluck('courseId')->toArray();
        $courses->each(function ($course) use ($wishlistCourseIds) {
            $course->inWishlist = in_array($course->id, $wishlistCourseIds);
        });
    }

    $country = AddCourse::select('country')->distinct()->pluck('country');

    // Get universities according to the selected country
    $universitiesQuery = AddCourse::select('universityname')->distinct();
    if (!empty($location) && $location !== 'All') {
        $universitiesQuery->where('country', $location);
    }
    $univeristies = $universitiesQuery->get();
    
   // dd($univeristies);

    $programs = AddCourse::select('programmename')->distinct()->pluck('programmename');

    $course_category = DB::table('course_category')->get();

    $programname = AddCourse::select('programmename', 'universityname')->distinct()->get();

    $programnames = $programname->map(function ($program) {
        $program->programmename = addcslashes($program->programmename, '/');
        $program->universityname = addcslashes($program->universityname, '/');
        return $program;
    });

    $totalCourses = $courses->count();
    $locations = AddCourse::select('location')->distinct()->pluck('location');

    return view('courses.index_search', compact('courses', 'locations', 'univeristies', 'programs', 'programnames', 'course_category', 'totalCourses', 'country', 'TotalCountCourses'))->with('fragment', 'course_details_section');
}



    public function getCoursebytopUniversity($universityname, $location)
    {

        $TotalCountCourses = AddCourse::get()->count();

        $query = AddCourse::query();
        if ($universityname && !empty($universityname)) {
            $query->where('universityname', $universityname);
        }
        if ($location && !empty($location)) {
            $query->where('country', $location);
        }

        $courses = $query->get();

        if (!empty(Auth::id())) {
            $userId = auth()->user()->id;
            $wishlistCourseIds = Wishlist::where('userID', $userId)->pluck('courseId')->toArray();
            $courses->each(function ($course) use ($wishlistCourseIds) {
                $course->inWishlist = in_array($course->id, $wishlistCourseIds);
            });
        }
        $country = AddCourse::select('country')->distinct()->pluck('country');
        $univeristies = AddCourse::select('universityname', 'location')->distinct()->get();

        $programs = AddCourse::select('programmename')->distinct()->pluck('programmename');

        $course_category = DB::table('course_category')->get();

        $programname = AddCourse::select('programmename', 'universityname')->distinct()->get();

        $programnames = $programname->map(function ($program) {
            $program->programmename = addcslashes($program->programmename, '/');
            $program->universityname = addcslashes($program->universityname, '/');
            return $program;
        });



        $totalCourses = $courses->count();
        $locations = AddCourse::select('location')->distinct()->pluck('location');

        return view('courses.index', compact('courses', 'locations', 'univeristies', 'programs', 'programnames', 'course_category', 'totalCourses', 'TotalCountCourses', 'country'))->with('fragment', 'course_details_section');
    }





    public function getCourse(Request $request, $name = null)
    {





        $TotalCountCourses = AddCourse::get()->count();
        //  dd($TotalCountCourses);
        $country = $request->location ?? null;
        $level = $request->level ?? null;
        $programmename = $request->programmename ?? null;

        $universityname = $request->universityname ?? null;

        $query = AddCourse::query();
        if ($request->has('level') && !empty($request->level)) {
            $query->where('level', $request->level);
        }
        if ($request->has('location') && !empty($request->location)) {
            $query->where('country', $request->location);
        }
        if ($request->has('programmename') && !empty($request->programmename)) {
            $query->where('fieldofstudy', 'LIKE', '%' . $request->programmename . '%');
        }

        if ($request->has('universityname') && !empty($request->universityname)) {

            $query->where('universityname', $request->universityname);
        }






        if (!empty($name)) {
            $query->where('level', 'LIKE', '%' . $name . '%');
        }
        $courses = $query->get();



        // dd($courses);




        $totalCourses = $courses->count();

        // dd($totalCourses);
        if (!empty(Auth::id())) {
            $userId = auth()->user()->id;
            $wishlistCourseIds = Wishlist::where('userID', $userId)->pluck('courseId')->toArray();
            $courses->each(function ($course) use ($wishlistCourseIds) {
                $course->inWishlist = in_array($course->id, $wishlistCourseIds);
            });
        }
        $country = AddCourse::select('country')->distinct()->pluck('country');
        $univeristies = AddCourse::select('universityname', 'country')->distinct()->get();
        
       // dd($univeristies);

        $programs = AddCourse::select('programmename')->distinct()->pluck('programmename');

        $course_category = DB::table('course_category')->get();

        $programname = AddCourse::select('programmename', 'universityname')->distinct()->get();

        $programnames = $programname->map(function ($program) {
            $program->programmename = addcslashes($program->programmename, '/');
            $program->universityname = addcslashes($program->universityname, '/');
            return $program;
        });

        $locations = AddCourse::select('location')->distinct()->pluck('location');



        $filters = [$request->level, $request->location, $request->programmename];



        if ($request->ajax()) {
            $htmlContent = view('courses._details', compact('courses'))->render();
            return response()->json(['html' => $htmlContent, 'totalCourses' => $totalCourses, 'filters' => $filters]);
        } else {
            //   dd($courses);

            return view('courses.index', compact('courses', 'programnames', 'locations', 'univeristies', 'programs', 'level', 'programmename', 'course_category', 'totalCourses', 'TotalCountCourses', 'country'))->with('fragment', 'course_details_section');
        }
    }




    // public function getUniCourses(Request $request){
    //     $programmename = AddCourse::select('programmename')->where('universityname',$request->uni)->distinct()->pluck('programmename');
    //     return response()->json($programmename);
    // }

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

        $country = AddCourse::select('country')->distinct()->pluck('country');
        $courses = $query->get();
        $locations = AddCourse::select('location')->distinct()->pluck('location');
        $univeristies = AddCourse::select('universityname')->distinct()->pluck('universityname');
        $programs = AddCourse::select('programmename')->distinct()->pluck('programmename');
        if ($request->ajax()) {
            $htmlContent = view('courses._details', compact('courses'))->render();
            return response()->json(['html' => $htmlContent]);
        } else {
            return view('courses.index', compact('courses', 'locations', 'univeristies', 'programs', 'country'));
        }
    }
    public function getCourseDetails($id)
    {
        $course = AddCourse::find($id);
        return view('courses.details', compact('course'));
    }


    // public function getFilteredDetails(Request $request)
    // {

    //     $TotalCountCourses = AddCourse::get()->count();
    //     $deadline = $request->ApplicationDeadline;
    //     $query = AddCourse::query();

    //     // Filter by tuition fee if present
    //     if ($request->filled('tuitionfee')) {
    //         $tuitionFee = (int) $request->tuitionfee;
    //         $query->where('tuitionfee', '<=', $tuitionFee);
    //     }

    //     // Process remaining filters except the special ones
    //     $allowedFilters = ['universityname', 'studymode', 'programme', 'fieldofstudy'];
    //     foreach ($allowedFilters as $filter) {
    //         if ($request->filled($filter)) {
    //             $query->where($filter, $request->input($filter));
    //         }
    //     }

    //     // Filter by course level (multiple values)
    //     if ($request->filled('levels')) {
    //         $query->whereIn('level', (array) $request->levels);
    //     }

    //     // Filter by location (ensure it's an array)
    //     if ($request->filled('location')) {
    //         $locations = is_array($request->location) ? $request->location : [$request->location];
    //         $query->whereIn('country', $locations);
    //     }

    //     // Handle Application Deadline filters
    //     if ($request->filled('ApplicationDeadline')) {
    //         $now = Carbon::now('UTC');
    //         $karachiOffset = Carbon::now('Asia/Karachi')->offsetHours;

    //         if ($deadline === 'open') {
    //             $query->where('ApplicationDeadline', '>', $now->copy()->addHours($karachiOffset));
    //         } elseif ($deadline === 'closed') {
    //             $query->where('ApplicationDeadline', '<', $now->copy()->addHours($karachiOffset));
    //         } elseif ($deadline === 'closing soon') {
    //             $query->where('ApplicationDeadline', '>', $now->copy()->addHours($karachiOffset))
    //                 ->where('ApplicationDeadline', '<', $now->copy()->addDays(21)->addHours($karachiOffset))
    //                 ->where('ApplicationDeadline', '>', $now->copy()->addDay()->addHours($karachiOffset));
    //         }
    //     }

    //     // Fetch the filtered courses
    //     $courses = $query->get();
    //     $totalCourses = $courses->count();

    //     // Render the HTML response
    //     $htmlContent = view('courses._details', compact('courses'))->render();

    //     return response()->json([
    //         'html' => $htmlContent,
    //         'totalCourses' => $totalCourses,
    //         'filters' => $request->all(),
    //         'TotalCountCourses' => $TotalCountCourses
    //     ]);
    // }

    public function getFilteredDetails(Request $request)
    {
        $limit = $request->input('limit', 5);  // Default to 5 results per page
        $page = $request->input('page', 1);    // Default to page 1
    
        $TotalCountCourses = AddCourse::count();  // Total count of all courses
        $query = AddCourse::query();
    
        // Apply filters
        if ($request->filled('tuitionfee')) {
          //  $query->where('tuitionfee', '<=', $request->tuitionfee);

            $query->whereRaw('CAST(tuitionfee AS UNSIGNED) <= ?', [$request->tuitionfee]);

        }


       
        
    
        $allowedFilters = ['universityname', 'studymode', 'programme', 'fieldofstudy'];
        foreach ($allowedFilters as $filter) {
            if ($request->filled($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }
    
        if ($request->filled('levels')) {
            $query->whereIn('level', (array)$request->levels);
        }
    
        if ($request->filled('location')) {
            $locations = is_array($request->location) ? $request->location : [$request->location];
            $query->whereIn('country', $locations);
        }
    
        if ($request->filled('ApplicationDeadline')) {
            $now = Carbon::now('UTC');
            $karachiOffset = Carbon::now('Asia/Karachi')->offsetHours;
    
            if ($request->ApplicationDeadline === 'open') {
                $query->where('ApplicationDeadline', '>', $now->copy()->addHours($karachiOffset));
            } elseif ($request->ApplicationDeadline === 'closed') {
                $query->where('ApplicationDeadline', '<', $now->copy()->addHours($karachiOffset));
            } elseif ($request->ApplicationDeadline === 'closing soon') {
                $query->whereBetween('ApplicationDeadline', [
                    $now->copy()->addDay()->addHours($karachiOffset),
                    $now->copy()->addDays(21)->addHours($karachiOffset)
                ]);
            }
        }

        if ($request->filled('sortBy')) {
            $sortBy = $request->input('sortBy');
            if ($sortBy === 'asc') {
                $query->orderBy('title', 'asc'); // A to Z
            } elseif ($sortBy === 'desc') {
                $query->orderBy('title', 'desc'); // Z to A
            }
        }
        
    
        // Apply pagination
        $totalFilteredCourses = $query->count();  // Get total filtered courses count
        $courses = $query->skip(($page - 1) * $limit)  // Offset calculation
                         ->take($limit)                // Limit the results
                         ->get();
    
        // Calculate total pages
        $totalPages = ceil($totalFilteredCourses / $limit);
    
        // Render the HTML for the courses
        $htmlContent = view('courses._details', compact('courses'))->render();
    
        return response()->json([
            'html' => $htmlContent,
            'totalCourses' => $totalFilteredCourses,    // Total filtered courses count
            'TotalCountCourses' => $TotalCountCourses,  // Total courses without filters
            'totalPages' => $totalPages,                // Total pages based on limit
            'currentPageCount' => $courses->count(),    // Current page course count
            'filters' => $request->all(),
        ]);
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
    


public function getUniversitiesByCountry(Request $request)
{
    $country = $request->input('country');

    // Initialize the query to fetch universities
    $universitiesQuery = AddCourse::select('universityname')->distinct();

    // If a specific country is provided and it's not 'all', filter by that country
    if (!empty($country) && $country !== 'all') {
        $universitiesQuery->where('country', $country);
    }

    // Fetch the universities, either filtered by country or all if 'all' is specified
    $universities = $universitiesQuery->get();

    return response()->json($universities);
}





}
