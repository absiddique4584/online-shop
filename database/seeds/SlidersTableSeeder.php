<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;
class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $index) {
            Slider::create([
                'title'     => "New Collections",
                'sub_title' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit.",
                'image'     => $this->getRandomImage(),
                'url'       => "",
                'start'     => date('Y-m-d'),
                'end'       => date('Y-m-d', strtotime('+1 years')),
                'status'    => $this->getRandomStatus()
            ]);
        }
    }

    /**
     * @return mixed
     */
    public function getRandomStatus()
    {
        # Generate random status
        $statuses = array('active', 'inactive');
        return $statuses[array_rand($statuses)];
    }

    /**
     * @return mixed
     */
    public function getRandomImage()
    {
        # Generate random image
        $image = array('01.jpg', '02.jpg', '03.png');
        return $image[array_rand($image)];
    }
}