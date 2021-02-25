<?php

namespace App\Http\Controllers;

use App\Mail\newsMail;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        return response()->json($schools);
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
            'Name' => 'required',
            'email' => 'required|email',
            'logo' => 'required|mimes:jpeg,jpg,png,gif|dimensions:min_width=100,min_height=100',
        ]);

            $path = Storage::path($request->logo);
            $path = $request->file('logo')->store(
                'logo', 'public'
            );
        if ($validated) {
            $school = new School();
            $school->name = $request->name;
            $school->email = $request->email;
            $school->logo =$path;
            $school->website = $request->website;
            if ($school->save()) {
               // $mailSent = new newsMail();
               // $mailSent->sendMail();
                return response()->json(["success" => "School Added.", "data" => $school], 200);
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
        $school = School::find($id);
        return response()->json($school);
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
        $school = School::find($id);

        $request->validate([
            'Name' => 'required',
            'email' => 'required|email',
            'logo' => 'required|dimensions:min_width=100,min_height=100',
        ]);

        if ($request) {
            $school->name = $request->name;
            $school->email = $request->email;
            $school->logo = $request->logo;
            $school->request = $request->request;

            if ($school->update()) {
                return response()->json(["success" => "Information successfully edited.", "data" => $school], 200);
            } else {
                return response()->json(["error" => "Update data failed.", "data" => $school], 400);
            }
        } else {
            return response()->json(["error" => "Data is wrong.", "data" => $school], 400);
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
        School::destroy($id);
        return response()->json('School successfully deleted.');
    }
}
