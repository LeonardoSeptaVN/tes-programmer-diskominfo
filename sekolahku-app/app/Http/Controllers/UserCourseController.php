<?php

namespace App\Http\Controllers;

use App\Models\UserCourse;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userCourses = UserCourse::with(['user', 'course'])->paginate(10);
        return view('user_course.index', compact('userCourses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $courses = Course::all();
        return view('user_course.create', compact('users', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        UserCourse::create($data);

        return redirect()->route('user_course.index')->with('success', 'User-Course relation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserCourse $userCourse)
    {
        return view('user_course.show', compact('userCourse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserCourse $userCourse)
    {
        $users = User::all();
        $courses = Course::all();
        return view('user_course.edit', compact('userCourse', 'users', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserCourse $userCourse)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $userCourse->update($data);

        return redirect()->route('user_course.index')->with('success', 'User-Course relation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserCourse $userCourse)
    {
        $userCourse->delete();

        return redirect()->route('user_course.index')->with('success', 'User-Course relation deleted successfully.');
    }
}
