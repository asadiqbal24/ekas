<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddCourse;
use App\Models\Todo;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getTodos()
    {
        $userId = auth()->id();
        $todos = Todo::where('user_id', $userId)->get();
        return response()->json(['todos' => $todos]);
    }
    public function dashboard()
    {
        if (auth()->check()) {
            $userId = auth()->id();
            $wishlistEntries = Wishlist::where('userID', $userId)->get();
            $wishlistCourseIds = $wishlistEntries->pluck('courseId')->toArray();
            $courses = AddCourse::whereIn('id', $wishlistCourseIds)->get();
            $soon = Carbon::now()->addDays(3);
            $courses->each(function ($course) use ($soon) {
                $course->inWishlist = true;
                $course->expiringSoon = $course->ApplicationDeadline >= Carbon::now() && $course->ApplicationDeadline <= $soon;
            });
            $todos = Todo::where('user_id', $userId)->get();
        }
        return view('user.dashboard', compact('courses', 'todos'));
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function updateInfo(Request $request)
    {
        $user = User::find(Auth::id());
        $data = $request->all();

        if (!empty($data['old_password'])) {
            if (Hash::check($data['old_password'], $user->password)) {
                if (!empty($data['password']) && !empty($data['password_confirmation'])) {
                    if ($data['password'] === $data['password_confirmation']) {
                        $user->password = Hash::make($data['password']);
                        $user->save();
                        return redirect()->back()->with('success', 'Password updated successfully.');
                    } else {
                        return redirect()->back()->with('error', 'New passwords do not match.');
                    }
                } else {
                    return redirect()->back()->with('error', 'New password and confirmation are required.');
                }
            } else {
                return redirect()->back()->with('error', 'Your current password does not match the password you provided. Please try again.');
            }
        } else {
            unset($data['password'], $data['password_confirmation'], $data['old_password']);
            $user->update($data);
            return redirect()->back()->with('success', 'Profile updated successfully.');
        }
    }

    public function addToList(Request $request)
    {
        $request->validate([
            'task_description' => 'required',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        Todo::create($data);
        return response()->json(['message' => 'To do list added successfully.']);
    }
    public function deleteToList($id)
    {
        Todo::where('id', $id)->where('user_id', Auth::id())->first()->delete();
        return response()->json(['success' => true]);
    }
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required']);
        DB::table('subscribe')->insert(['email' => $request->email]);
        return redirect()->back()->with('success', 'subscribed successfully.');
    }
}
