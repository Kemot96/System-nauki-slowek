<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name' => 'Polski',
            'symbol' => 'PL',
        ]);
        DB::table('languages')->insert([
            'name' => 'Angielski',
            'symbol' => 'EN',
        ]);
        DB::table('languages')->insert([
            'name' => 'Niemiecki',
            'symbol' => 'DE',
        ]);
    }
}
