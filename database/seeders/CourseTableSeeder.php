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
            'Name' => Str::random(20),
            'campus' => $campusesIDs[0],
            'CourseTypes' => $course_typesIDs[0],
            'price' => rand( 10 , 20 ) / 10
        ]);
    }
}
