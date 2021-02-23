<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_GB');

        DB::table("schools")->insert([
            'Name' => Str::random(20),
            'email' => $faker->safeEmail,
            'logo' => Str::random(20),
            'website' => Str::random(20)
        ]);
    }
}
