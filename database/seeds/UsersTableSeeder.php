<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@gmail.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);

        User::create([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane.doe@gmail.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);

        User::create([
            'first_name' => 'Jason',
            'last_name' => 'Bourne',
            'email' => 'jason.bourne@gmail.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);

        User::create([
            'first_name' => 'Mark',
            'last_name' => 'Doe',
            'email' => 'mark.doe@gmail.com',
            'password' => bcrypt('password'),
            'role' => 2
        ]);

        User::create([
            'first_name' => 'Kyrie',
            'last_name' => 'Drew',
            'email' => 'kyrie.drew@gmail.com',
            'password' => bcrypt('password'),
            'role' => 2
        ]);

        User::create([
            'first_name' => 'Kobe',
            'last_name' => 'Doe',
            'email' => 'kobe.doe@gmail.com',
            'password' => bcrypt('password'),
            'role' => 3
        ]);

        User::create([
            'first_name' => 'Lebron',
            'last_name' => 'Drew',
            'email' => 'lebron.drew@gmail.com',
            'password' => bcrypt('password'),
            'role' => 3
        ]);
    }
}