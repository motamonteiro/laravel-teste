<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Category::class)->create(['name' => 'Camisetas']);
        factory(\App\Category::class)->create(['name' => 'Calças']);
        factory(\App\Category::class)->create(['name' => 'Camisas']);
        factory(\App\Category::class)->create(['name' => 'Jaquetas']);
        factory(\App\Category::class)->create(['name' => 'Ternos']);
        factory(\App\Category::class)->create(['name' => 'Óculos de sol']);
        factory(\App\Category::class)->create(['name' => 'Carteiras']);
    }
}
