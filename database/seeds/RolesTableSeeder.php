<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //predefiniowane role w portalu
        DB::table('roles')->insert([  //id=1
            'name' => 'Administrator',
            'description' => 'Administrator portalu',
        ]);
        DB::table('roles')->insert([  //id=2
            'name' => 'Super Redaktor',
            'description' => 'Super Redaktor portalu',
        ]);
        DB::table('roles')->insert([  //id=3
            'name' => 'Redaktor',
            'description' => 'Redaktor portalu',
        ]);
    }
}
