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
        DB::table('users')->insert([
            'name' => 'Jan Kowalski',
            'email' => 'admin@wp.pl',
            'password' => bcrypt('admin'),
            'created_at' => '2018-12-01',
            'updated_at' => '2018-12-01',
        ]);

        DB::table('users')->insert([
            'name' => 'Jerzy Nowak',
            'email' => 'superredaktor@wp.pl',
            'password' => bcrypt('superredaktor'),
            'created_at' => '2018-12-02',
            'updated_at' => '2018-12-02',
        ]);
        DB::table('users')->insert([
            'name' => 'Anna Nowak',
            'email' => 'redaktor@wp.pl',
            'password' => bcrypt('redaktor'),
            'created_at' => '2018-12-04',
            'updated_at' => '2018-12-04',
        ]);

        DB::table('users')->insert([
            'name' => 'Marzena Styczeń',
            'email' => 'user1@wp.pl',
            'password' => bcrypt('user1'),
            'created_at' => '2018-12-06',
            'updated_at' => '2018-12-06',
        ]);

        DB::table('users')->insert([
            'name' => 'Marcin Piątek',
            'email' => 'user2@wp.pl',
            'password' => bcrypt('user2'),
            'created_at' => '2018-12-08',
            'updated_at' => '2018-12-08',
        ]);

        DB::table('users')->insert([
            'name' => 'Weronika Radosna',
            'email' => 'user3@wp.pl',
            'password' => bcrypt('user3'),
            'created_at' => '2018-12-12',
            'updated_at' => '2018-12-12',
        ]);

    }
}
