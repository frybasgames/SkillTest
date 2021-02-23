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


    public function store(Request $request)
    {
        $validated=$request->validate([
            'Name' => 'required',
            'campus' => 'required',
            'courseTypes' => 'required_without_all:courseTypes',
        ]);


        if ($validated) {
            $course = new Courses();
            $course->Name = $request->Name;
            $course->campus = $request->campus;
            $course->courseTypes = $request->courseTypes;
            $course->price = $request->price;
            if ($course->save()) {
                return response()->json(["success" => "Course Added.", "data" => $course], 200);
            } else {
                return response()->json(["error" => "Adding data failed."], 400);
            }
        } else {
            return response()->json(["error" => "Data is wrong"], 400);
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

        $validated=$request->validate([
            'Name' => 'required',
            'campus' => 'required',
            'courseTypes' => 'required_without_all:courseTypes',
        ]);


        if ($validated) {
            $course->Name = $request->Name;
            $course->campus = $request->campus;
            $course->courseTypes = $request->courseTypes;
            $course->price = $request->price;
            if ($course->save()) {
                return response()->json(["success" => "Course Added.", "data" => $course], 200);
            } else {
                return response()->json(["error" => "Adding data failed."], 400);
            }
        } else {
            return response()->json(["error" => "Data is wrong"], 400);
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
