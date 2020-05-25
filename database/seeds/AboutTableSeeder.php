<?php

use Illuminate\Database\Seeder;
use App\Models\About;
class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'long_desc' => 'EBugs does not just sell lifestyle products, EBugs is here to become a lifestyle!

eBugs is not a marketplace with bunch of sellers like other ecommerce sites. eBugs only sell products from their stock and source so that you wil get the real product what you have ordered from website.',
        ]);

    }
}
