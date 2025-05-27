<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 8; $i++) {
            $newProject = new Project();

            $newProject->title = $faker->sentence();
            $newProject->content = $faker->paragraph(12);
            $newProject->image = $faker->mimeType();

            $newProject->save();
        }
    }
}
