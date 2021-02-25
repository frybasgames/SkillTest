<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampusRequest;
use App\Models\Campus;
use Illuminate\Http\Request;

class CampusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campus::all();
        return response()->json($campuses);
    }

    public function create(CampusRequest $request){
        Campus::create($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $campuse = new Campus();

            $campuse->name = $request->name;
            $campuse->school = $request->school;
            $campuse->email = $request->email;
            $campuse->phone = $request->phone;
            $campuse->address = $request->address;
            if ($campuse->save()) {
                return response()->json(["success" => "Campuse Added.", "data" => $campuse], 200);
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
        $campuse = Campus::find($id);
        return response()->json($campuse);
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

        $campuse = Campus::find($id);



            $campuse->name = $request->name;
            $campuse->school = $request->school;
            $campuse->email = $request->email;
            $campuse->phone = $request->phone;
            $campuse->address = $request->address;
            if ($campuse->save()) {
                return response()->json(["success" => "Campuse Added."], 200);
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
        Campus::destroy($id);
        return response()->json('Campus successfully deleted.');
    }
}
