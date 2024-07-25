<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Woman;

class WomenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('women')->delete();

        $faker = Faker::create();
        $imageDirectory = public_path('storage/imgs/');

        for ($i = 0; $i < 20; $i++) {
            Woman::create([
                'name' => $faker->name,
                'biography' => $faker->paragraph,
                'field_of_work' => $faker->sentence,
                'image' => 'storage/imgs/'.basename($faker->image($dir=$imageDirectory, $width = 128, $height = 128)),
                'birth_date' => $faker->date('Y-m-d', 'now')
            ]);
        }
    }
}
