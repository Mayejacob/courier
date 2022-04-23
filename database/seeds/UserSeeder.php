<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'branch_id' => 1,
            'name' => 'Maye Jacob',
            'email' => 'admin@mayeconcept.com.ng',
            'username' => 'admin',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'branch_id' => 3,
            'name' => 'John Doe',
            'email' => 'staff@mayeconcept.com.ng',
            'username' => 'staff',
            'password' => bcrypt('password'),
        ]);
    }
}
