<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Szkoła Podstawowa',
            'description' => 'Zestawy słówek ze szkoły podstawowej',
            'picture_file_name' => 'c1.png',
            'created_at' => '2018-12-10',
            'updated_at' => '2018-12-10',
        ]);
        DB::table('categories')->insert([
            'name' => 'Liceum',
            'description' => 'Zestawy słówek z liceum',
            'picture_file_name' => 'c2.png',
            'created_at' => '2018-12-11',
            'updated_at' => '2018-12-11',
        ]);
        DB::table('categories')->insert([
            'name' => 'Podróże',
            'description' => 'Zestawy słówek związanych z podróżowaniem',
            'picture_file_name' => 'c3.png',
            'created_at' => '2018-12-12',
            'updated_at' => '2018-12-12',
        ]);

        DB::table('categories')->insert([
            'name' => 'Zwierzęta',
            'description' => 'Zestawy słówek związanych ze zwierzętami',
            'picture_file_name' => 'c4.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
        ]);

    }
}
