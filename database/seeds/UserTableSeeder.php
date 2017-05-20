<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'Jonh',
            'email' => 'jonh@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123mudar')
        ]);
        factory(App\User::class, 9)->create();
    }
}
