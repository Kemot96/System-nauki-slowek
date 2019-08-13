<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'users_id' => 1,
            'roles_id' => 1,
            'created_at' => '2018-12-04',
            'updated_at' => '2018-12-04',
        ]);

        DB::table('user_roles')->insert([
            'users_id' => 2,
            'roles_id' => 2,
            'created_at' => '2018-12-10',
            'updated_at' => '2018-12-10',
        ]);

        DB::table('user_roles')->insert([
            'users_id' => 3,
            'roles_id' => 3,
            'created_at' => '2018-12-10',
            'updated_at' => '2018-12-10',
        ]);
    }
}
