<?php

use Illuminate\Database\Seeder;

class EditorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function add($user1,$subcat1,$supred1=0)
    {
        DB::table('editors')->insert([
            'users_id' => $user1,
            'subcategories_id' => $subcat1,
            'supereditor' => $supred1,
        ]);

    }

    public function run()
    {
        $this->add(2,1,1);
        $this->add(2,2,1);
        $this->add(2,3,1);
        $this->add(2,4,1);
        $this->add(2,5,1);
        $this->add(2,6,1);
        $this->add(2,7,1);
        $this->add(2,8,1);

        $this->add(3,9,0);
        $this->add(3,10,0);
        $this->add(3,11,0);
        $this->add(3,12,0);
    }
}
