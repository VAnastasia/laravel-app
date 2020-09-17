<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'admin',
                'avatar' => 'uploads/zGIVERj3E1wdEGDMH1mE6oY39uuE4M9m2XNBm8O9.jpeg',
                'email' => 'mail@mail.ru',
                'password' => bcrypt('12345678')
            ],
            [
                'id' => 2,
                'name' => 'test-user',
                'avatar' => 'uploads/XubhcJxLs25FF52379aMpPiAwQxPkPi4o7XTqT9d.jpeg',
                'email' => 'user2@mail.ru',
                'password' => bcrypt('12345678')
            ]
        ];
    }
}
