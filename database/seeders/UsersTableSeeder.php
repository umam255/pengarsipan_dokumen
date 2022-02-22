<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'status_id' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@mail.com',
                'status_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'status_id' => '3',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
