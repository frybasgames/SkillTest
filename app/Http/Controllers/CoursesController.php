<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all();
        return response()->json($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Campus' => 'required',
            'CourseTypes' => 'required_without_all:CourseTypes',
        ]);

        $course = new Courses();

        if ($request) {
            $course->Name = $request->Name;
            $course->Campus = $request->Campus;
            $course->CourseTypes = $request->CourseTypes;
            if ($course->save()) {
                return response()->json(["success" => "Course Added.", "data" => $course], 200);
            } else {
                return response()->json(["error" => "Adding data failed.", "data" => $course], 400);
            }
        } else {
            return response()->json(["error" => "Data is wrong", "data" => $course], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Courses::find($id);
        return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Courses::find($id);

        $request->validate([
            'Name' => 'required',
            'Campus' => 'required',
            'CourseTypes' => 'required_without_all:CourseTypes',
        ]);

        if ($request) {
            $course->Name = $request->Name;
            $course->Campus = $request->Campus;
            $course->CourseTypes = $request->CourseTypes;
            if ($course->update()) {
                return response()->json(["success" => "Information successfully edited.", "data" => $course], 200);
            } else {
                return response()->json(["error" => "Update data failed.", "data" => $course], 400);
            }
        }else{
            return response()->json(["error" => "Data is wrong.", "data" => $course], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Courses::destroy($id);
        return response()->json('Course Type successfully deleted.');
    }
}
