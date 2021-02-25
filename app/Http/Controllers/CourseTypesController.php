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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated =$request->validate([
            'Name' => 'required'
        ]);

        if ($validated) {
            $CourseType = new CourseType();
            $CourseType->Name = $request->Name;
            if ($CourseType->save()) {
                return response()->json(["success" => "Campuse Added.", "data" => $CourseType], 200);
            } else {
                return response()->json(["error" => "Adding data failed." ], 400);
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
        $CourseType = CourseType::find($id);
        return response()->json($CourseType);
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
        $CourseType = CourseType::find($id);

        $request->validate([
            'Name' => 'required'
        ]);

        if($request){
            $CourseType->Name = $request->Name;
            if($CourseType->update()){
                return response()->json(["success" => "Information successfully edited.", "data" => $CourseType], 200);
            } else {
                return response()->json(["error" => "Update data failed.", "data" => $CourseType], 400);
            }
        }else{
            return response()->json(["error" => "Data is wrong.", "data" => $CourseType], 400);
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
