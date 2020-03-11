<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Permission::class)->create(['name' => 'Manage users', 'route' => 'users.index']);
        factory(\App\Permission::class)->create(['name' => 'Manage products', 'route' => 'products.index']);
        factory(\App\Permission::class)->create(['name' => 'Manage categories', 'route' => 'categories.index']);
        factory(\App\Permission::class)->create(['name' => 'Manage brands', 'route' => 'brands.index']);
    }
}
