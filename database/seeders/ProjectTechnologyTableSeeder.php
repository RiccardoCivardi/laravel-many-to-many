<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 200; $i++){

            // estraggo un progetto random
            $project = Project::inRandomOrder()->first();

            // estraggo un ID random da technology
            $technology_id = Technology::inRandomOrder()->first()->id;

            // inserisco il dato nella tabella ponte
            // con ->attach viene inserita la relazione nella tabella ponte
            // al metodo attach posso passare un sigolo ID o un array di ID
            $project->technologies()->attach($technology_id);
        }
    }
}
