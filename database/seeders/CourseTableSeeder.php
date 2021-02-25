<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $campusesIDs = DB::table('campuses')->pluck('id');
        $course_typesIDs = DB::table('course_types')->pluck('id');

        DB::table("courses")->insert([
            'name' => Str::random(20),
            'campus' => $campusesIDs[rand(0,count($campusesIDs)-1)],
            'courseTypes' => $course_typesIDs[rand(0,count($course_typesIDs)-1)],
            'price' => rand( 10 , 20 ) / 10
        ]);
    }
}
