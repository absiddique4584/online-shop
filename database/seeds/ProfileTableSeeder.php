<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;
class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Profile::create([
          'name' => 'MD ABU BAKAR SIDDIQUE',
          'address' => 'Village:Kellabond C,O Bazar Post:Upasohar Sub-District:Rangpur Sadar District:Rangpur',
          'phone' => '1738254983',
          'website_address' => 'https://siddiquebd.com',
          'email' => 'mdsumon7914@gmail.com',
          'image' => 'hero.jpg',
          'create' => rand(0,1)
      ]);
    }
}
