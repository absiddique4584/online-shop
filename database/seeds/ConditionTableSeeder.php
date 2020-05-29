<?php

use Illuminate\Database\Seeder;
use App\Models\Condition;
class ConditionTableSeeder extends Seeder
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
            Condition::create([
            'introduction'=>$faker->sentence,
            'account' =>$faker->sentence,
            'order' =>$faker->paragraph,
            'conduct' =>$faker->paragraph,
            'submission' =>$faker->paragraph,
            'information' =>$faker->paragraph,
            'indemnity' =>$faker->paragraph,
            'losses' =>$faker->paragraph,
            'promise' =>$faker->paragraph,
            'waiver' =>$faker->sentence,
            'law' =>$faker->paragraph,
            'offer' =>$faker->paragraph,
            'process' =>$faker->paragraph,
            'security' =>$faker->paragraph,
            'warranty' =>$faker->paragraph

            ]);
        }
    }
}
