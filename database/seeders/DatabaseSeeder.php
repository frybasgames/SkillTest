<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SchoolTableSeeder::class);
        $this->call(CampusesTableSeeder::class);
        $this->call(CourseTypesTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        
        
    }
}
