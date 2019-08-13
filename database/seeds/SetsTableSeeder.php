<?php

use Illuminate\Database\Seeder;

class SetsTableSeeder extends Seeder
{
    public function add($user1,$subcat1,$lan1,$lan2,$name1,$words1)
    {
        $created_at1=date('Y-m-d H:i:s');
        $updated_at1=date('Y-m-d H:i:s');
        $private1=0;
        $deleted1=null;
        $number_of_words1=substr_count($words1,"\n")+1;

        DB::table('sets')->insert([
            'users_id' => $user1,
            'subcategories_id' => $subcat1,
            'languages1_id' => $lan1,
            'languages2_id' => $lan2,
            'name' => $name1,
            'words' => $words1,
            'number_of_words' => $number_of_words1,
            'private' => "$private1",
            'created_at' => "$created_at1",
            'updated_at' => "$updated_at1",
        ]);
    }
    public function run()
    {
        $words="jeden;one\ndwa;two\ntrzy;three\ncztery;four\npięć;five";
        $this->add(2,1,1,2,'Liczby 1-5',$words);
        $words="biały; white\n czarny  ;  black";
        $this->add(3,1,1,2,'Kolory 2',$words);
        $words="biały; white\n czarny  ;  black\nczerwony;red";
        $this->add(3,1,1,2,'Kolory 3',$words);
        $words="biały; white\n czarny  ;  black\nczerwony;red\nzielony;green\nniebieski;blue";
        $this->add(3,1,1,2,'Kolory 5',$words);
    }
}
