<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];

        $users[] = [
            'name' => 'John',
            'email' => 'johnvoid@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => 79251112233,
        ];

        $users[] = [
            'name' => 'Mike',
            'email' => 'mikegreen@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => 79361112233,
        ];

        DB::table('users')->insert($users);
    }
}
