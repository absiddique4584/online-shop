<?php

use Illuminate\Database\Seeder;
use App\Models\Policy;
class PolicyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,3)as $index){
            Policy::create([
              'privacy_policy' => $faker->paragraph,
              'collect_info' => $faker->paragraph,
              'utilize_info' => $faker->paragraph
            ]);
        }
    }
}
