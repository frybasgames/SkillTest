<?php

namespace App\Http\Controllers;

use App\Models\CourseType;
use Illuminate\Http\Request;

class CourseTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseTypes = CourseType::all();
        return response()->json($courseTypes);
    }

    public function create(CourseTypeRequest $request){
        CourseType::create($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courseType = CourseType::create($request->post());

        if ($courseType) {
            return response()->json(["success" => "CourseType Added.", "data" => $courseType], 200);
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
        $courseType = CourseType::find($id);
        return response()->json($courseType);
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
        $courseType = CourseType::find($id);
        $input = $request->all();

        if ($courseType->fill($input)->save()) {
             return response()->json(["success" => "Information successfully edited.", "data" => $courseType], 200);
        } else {
             return response()->json(["error" => "Update data failed.", "data" => $courseType], 400);
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
        CourseType::destroy($id);
        return response()->json('Course Type successfully deleted.');
    }
}
