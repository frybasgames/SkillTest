<?php

namespace App\Http\Controllers;

use App\Models\Course;
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
        $courses = Course::all();
        return response()->json($courses);
    }

    public function create(CourseRequest $request){
        Course::create($request->all());
    }


    public function store(Request $request)
    {
        $courses = Course::create($request->post());

        if ($courses) {
            return response()->json(["success" => "Cource Added.", "data" => $courses], 200);
        } else {
            return response()->json(["error" => "Adding data failed."], 400);
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
        $course = Course::find($id);
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
        $course = Course::find($id);

        $input = $request->all();

        if ($course->fill($input)->save()) {
            return response()->json(["success" => "Course Added.", "data" => $course], 200);
        } else {
            return response()->json(["error" => "Adding data failed."], 400);
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
        Course::destroy($id);
        return response()->json('Course Type successfully deleted.');
    }
}
