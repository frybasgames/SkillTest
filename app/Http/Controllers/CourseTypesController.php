<?php

namespace App\Http\Controllers;

use App\Models\CourseTypes;
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
        $courseTypes = CourseTypes::all();
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
        $request->validate([
            'Name' => 'required'
        ]);

        $CourseType = new CourseTypes();

        if ($request) {
            $CourseType->Name = $request->Name;
            if ($CourseType->save()) {
                return response()->json(["success" => "Campuse Added.", "data" => $CourseType], 200);
            } else {
                return response()->json(["error" => "Adding data failed.", "data" => $CourseType], 400);
            }
        } else {
            return response()->json(["error" => "Data is wrong", "data" => $CourseType], 400);
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
        $CourseType = CourseTypes::find($id);
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
        $CourseType = CourseTypes::find($id);

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
        CourseTypes::destroy($id);
        return response()->json('Course Type successfully deleted.');
    }
}
