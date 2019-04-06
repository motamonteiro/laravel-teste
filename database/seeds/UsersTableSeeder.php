<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Usuário administrador',
            'email' => 'administrador@test.com',
            'password' => bcrypt(123456),
            'is_admin' => true,
        ]);

        factory(\App\User::class)->create([
            'name' => 'Usuário comum',
            'email' => 'comum@test.com',
            'password' => bcrypt(123456),
            'is_admin' => false,
        ]);

        factory(\App\User::class, 18)->create();

    }
}
