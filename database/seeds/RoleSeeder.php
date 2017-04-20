<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('roles')->delete();
        DB::table('roles')->insert(array('code'=>'all', 'name'=>'All','created_at' => new DateTime,'updated_at' => new DateTime));
        DB::table('roles')->insert(array('code'=>'Admin', 'name'=>'Admin','created_at' => new DateTime,'updated_at' => new DateTime));
        DB::table('roles')->insert(array('code'=>'profile', 'name'=>'Profile','created_at' => new DateTime,'updated_at' => new DateTime));
    }
}
