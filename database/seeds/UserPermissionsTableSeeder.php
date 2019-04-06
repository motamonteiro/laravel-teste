<?php

use Illuminate\Database\Seeder;

class UserPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\UserPermissions::class)->create([
            'user_id' => '1',
            'permission_id' => '1',
        ]);

        factory(\App\UserPermissions::class)->create([
            'user_id' => '1',
            'permission_id' => '2',
        ]);

        factory(\App\UserPermissions::class)->create([
            'user_id' => '1',
            'permission_id' => '3',
        ]);

        factory(\App\UserPermissions::class)->create([
            'user_id' => '1',
            'permission_id' => '4',
        ]);

        factory(\App\UserPermissions::class)->create([
            'user_id' => '2',
            'permission_id' => '2',
        ]);

        factory(\App\UserPermissions::class)->create([
            'user_id' => '2',
            'permission_id' => '3',
        ]);

        factory(\App\UserPermissions::class)->create([
            'user_id' => '2',
            'permission_id' => '4',
        ]);

        $faker = Faker\Factory::create();
        $created = [];
        for ($i = 1; $i <= 100; $i++) {
            $data = [
                'user_id' => $faker->numberBetween(3,20), //20 users created at UsersTableSeeder
                'permission_id' => $faker->numberBetween(2,4), //4 permissions created at PermissionsTableSeeder
            ];

            if (!in_array($data, $created)) {
                factory(\App\UserPermissions::class)->create($data);
                array_push($created, $data);
            }
        }

    }
}
