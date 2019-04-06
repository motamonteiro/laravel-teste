<?php

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
        factory(\App\Brand::class)->create(['name' => 'Adidas']);
        factory(\App\Brand::class)->create(['name' => 'Azaleia']);
        factory(\App\Brand::class)->create(['name' => 'Cavalera']);
        factory(\App\Brand::class)->create(['name' => 'Hering']);
        factory(\App\Brand::class)->create(['name' => 'Hugo Boss']);
        factory(\App\Brand::class)->create(['name' => 'John John']);
        factory(\App\Brand::class)->create(['name' => 'Lacoste']);
        factory(\App\Brand::class)->create(['name' => 'Nike']);
    }
}
