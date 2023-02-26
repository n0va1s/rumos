<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create(
            [
                'community_id' => 15, 
                'type_id' => 46, 
                'number'=>88, 
                'starts_at'=> '2022-10-01', 
                'ends_at'=>'2022-10-04'
            ]
        );
    }
}
