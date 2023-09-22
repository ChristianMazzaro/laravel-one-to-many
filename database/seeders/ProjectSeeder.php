<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//models
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();
        for ($i=0; $i < 20; $i++) { 
            $title = substr(fake()->sentence(), 0, 255); 
            Project::create([
                'title'=>$title,
                'slug'=>str()->slug($title),
                'content'=>fake()->paragraph(),

            ]);
        }
    }
}
