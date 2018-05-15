<?php

use Illuminate\Database\Seeder;

class AnalyticsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('analytics')->delete();
        
        \DB::table('analytics')->insert(array (
            0 => 
            array (
                'id' => 1,
                'view_code' => '174414026',
                'client_id' => '193475717749-8bf71itq2traomv5sr57an23jde7nia8.apps.googleusercontent.com',
            ),
        ));
        
        
    }
}