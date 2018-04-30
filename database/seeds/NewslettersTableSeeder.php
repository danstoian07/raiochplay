<?php

use Illuminate\Database\Seeder;

class NewslettersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('newsletters')->delete();
        
        \DB::table('newsletters')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'fylipdan@yahoo.com',
                'subscribed' => 1,
                'created_at' => '2018-04-30 12:57:33',
                'updated_at' => '2018-04-30 13:01:10',
            ),
            1 => 
            array (
                'id' => 2,
                'email' => 'fylipdan@gmail.com',
                'subscribed' => 1,
                'created_at' => '2018-04-30 12:58:33',
                'updated_at' => '2018-04-30 12:58:33',
            ),
            2 => 
            array (
                'id' => 3,
                'email' => 'dan@netsud.ro',
                'subscribed' => 0,
                'created_at' => '2018-04-30 13:01:31',
                'updated_at' => '2018-04-30 13:01:31',
            ),
        ));
        
        
    }
}