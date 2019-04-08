<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Calaigi Stelica',
                'email' => 'office@raiochplay.ro',
                'password' => bcrypt('123456'),
                'avatar'   => 'pp.jpeg',
                'remember_token' => NULL,
                'created_at' => '2018-04-10 12:41:17',
                'updated_at' => '2018-04-10 12:41:17',
            ),
        ));


    }
}