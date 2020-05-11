<?php
use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,10)as $index){
            $brand = $faker->name;
            Brand::create([
               'brand_name'=>$brand,
                'brand_slug'=>slugify($brand),
                'status'=>rand(0,1)
            ]);
        }
    }
}
