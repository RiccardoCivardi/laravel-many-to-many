<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Front End', 'Back End', 'Laravel', 'VueJs', 'Full stack'];

        foreach ($data as $thechnology) {
            $new_thechnology = new Technology();
            $new_thechnology->name = $thechnology;
            $new_thechnology->slug = Str::slug($thechnology);
            $new_thechnology->save();
        }
    }
}
