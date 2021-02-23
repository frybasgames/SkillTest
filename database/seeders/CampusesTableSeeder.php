<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CampusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('en_GB');

        $schoolsIDs = DB::table('schools')->pluck('id');

        DB::table("campuses")->insert([
            'Name' => Str::random(20),
            'school' => $schoolsIDs[rand(0,count($schoolsIDs)-1)],
            'email' => $faker->safeEmail,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
        ]);
    }
}
