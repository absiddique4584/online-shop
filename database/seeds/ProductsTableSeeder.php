<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,5)as $index){
            $name = $faker->sentence;
            Product::create([
                'cat_id'=>rand(1,10),
                'subcat_id'=>rand(1,10),
                'brand_id'=>rand(1,10),
                'name'=>$name,
                'slug'=>slugify($name),
                'model'=>$faker->name,
                'buying_price'=>rand(700,900),
                'selling_price'=>rand(920,1200),
                'special_price'=>rand(500,600),
                'special_start'=>$faker->date(),
                'special_end'=>$faker->date(),
                'quantity'=>rand(10,20),
                'video_url'=>$faker->imageUrl(),
                'warranty'=>0,
                'warranty_duration'=>null,
                'warranty_condition'=>null,
                'thumbnail'=>$faker->imageUrl(),
                'gallery'=>null,
                'description'=>$faker->paragraph,
                'long_description'=>null,
                'status'=>$this->getRandomStatus()
            ]);
        }
    }

    public function getRandomStatus(){
        $statuses =array('active','inactive');
        return $statuses[array_rand($statuses)];
    }
}
