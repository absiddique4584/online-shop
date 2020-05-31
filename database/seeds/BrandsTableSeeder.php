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
        $brands = ["Flamingo", "GKK", "JAVA Racing", "KEMEI", "Kiam", "Motorex", "Motul", "Remax", "xiaomi", "Yamalube"];

        foreach ($brands as $brand) {
            Brand::create([
                'brand_name' => $brand,
                'brand_slug' => slugify($brand),
                'top_brand'  => 1,
                'status'     => 1
            ]);
        }
    }
}