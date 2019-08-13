<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //w szkoła podstawowa
        DB::table('subcategories')->insert([
            'name' => 'Klasa 1',
            'description' => 'Zestawy słówek dla klasy 1',
            'picture_file_name' => 's1.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 1,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Klasa 2',
            'description' => 'Zestawy słówek dla klasy 2',
            'picture_file_name' => 's2.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 1,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Klasa 3',
            'description' => 'Zestawy słówek dla klasy 3',
            'picture_file_name' => 's3.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 1,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Klasa 4',
            'description' => 'Zestawy słówek dla klasy 4',
            'picture_file_name' => 's4.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 1,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Klasa 5',
            'description' => 'Zestawy słówek dla klasy 5',
            'picture_file_name' => 's5.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 1,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Klasa 6',
            'description' => 'Zestawy słówek dla klasy 6',
            'picture_file_name' => 's6.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 1,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Klasa 7',
            'description' => 'Zestawy słówek dla klasy 7',
            'picture_file_name' => 's7.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 1,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Klasa 8',
            'description' => 'Zestawy słówek dla klasy 8',
            'picture_file_name' => 's8.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 1,
        ]);

        //z liceum
        DB::table('subcategories')->insert([
            'name' => 'Klasa 1',
            'description' => 'Zestawy słówek dla klasy 1',
            'picture_file_name' => 's9.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 2,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Klasa 2',
            'description' => 'Zestawy słówek dla klasy 2',
            'picture_file_name' => 's10.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 2,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Klasa 3',
            'description' => 'Zestawy słówek dla klasy 3',
            'picture_file_name' => 's11.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 2,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Klasa 4',
            'description' => 'Zestawy słówek dla klasy 4',
            'picture_file_name' => 's12.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 2,
        ]);

        //z kategorii 3
        DB::table('subcategories')->insert([
            'name' => 'Lotnisko',
            'description' => 'Zestawy słówek lotnisko',
            'picture_file_name' => 's13.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 3,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Pociąg',
            'description' => 'Zestawy słówek pociąg',
            'picture_file_name' => 's14.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 3,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Autobus',
            'description' => 'Zestawy słówek autobus',
            'picture_file_name' => 's15.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 3,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Restauracja',
            'description' => 'Zestawy słówek restauracja',
            'picture_file_name' => 's16.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 3,
        ]);

        //z Zwierzęta
        DB::table('subcategories')->insert([
            'name' => 'Zwierzęta domowe',
            'description' => 'Zestawy słówek zwierzęta domowe',
            'picture_file_name' => 's17.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 4,
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Zwierzęta dzikie',
            'description' => 'Zestawy słówek zwierzęta dzikie',
            'picture_file_name' => 's18.png',
            'created_at' => '2018-12-13',
            'updated_at' => '2018-12-13',
            'categories_id' => 4,
        ]);

    }
}
