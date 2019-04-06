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
        factory(\App\Permission::class)->create(['name' => 'Manter usuários', 'route' => 'users.index']);
        factory(\App\Permission::class)->create(['name' => 'Manter produtos', 'route' => 'products.index']);
        factory(\App\Permission::class)->create(['name' => 'Manter categorias', 'route' => 'categories.index']);
        factory(\App\Permission::class)->create(['name' => 'Manter marcas', 'route' => 'brands.index']);
    }
}
