<?php

use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Permission::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'route' => strtolower($faker->name).'.index',
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'brand_id' => $faker->numberBetween(1,8), //8 brands created at BrandsTableSeeder
        'category_id' => $faker->numberBetween(1,7) //7 categories created at CategoriesTableSeeder
    ];
});

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'is_admin' => false,
    ];
});

$factory->define(App\UserPermissions::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(3,20), //20 users created at UsersTableSeeder
        'permission_id' => $faker->numberBetween(1,3) //3 permissions created at PermissionsTableSeeder
    ];
});