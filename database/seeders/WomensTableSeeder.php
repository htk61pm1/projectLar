<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Women;
class WomenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            
            $faker = Faker::create();
            foreach(range(1,50) as $index){
            DB::table('woman')->insert([
             'name'=> $faker->name,
             'biography'=> $faker-> sentence,
             'field_of_work'=> $faker-> sentence,
             'image' => $faker->imageUrl,
             'birth_date' => $faker->dateTime,
             'created_at'=> now(),
             'updated_at'=>now(),


            
            
            ]);     
    }
}
}
} 





