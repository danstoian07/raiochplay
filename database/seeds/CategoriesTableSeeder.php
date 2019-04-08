<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Leagane',
                'main_category_id' => NULL,
                'slug' => 'leagane',
                'keywords' => 'leagane, jocuri copii',
                'description' => 'Leaganele au fost intotdeauna adorate de copii. Ne amintim cu totii cum ne-au infrumusetat copilaria, ne-au amuzat si relaxat deopotriva, devenind in timp “piese” obligatorii in orice parc, loc de joaca sau curte, admirate si solicitate de toti copii.',
                'order' => 999,
                'picture' => 'swing.jpg',
                'active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Balansoare',
                'main_category_id' => NULL,
                'slug' => 'balansoare',
                'keywords' => 'balansoare, jocuri copii, parc copii, loc de joaca',
                'description' => 'Balansoarele sunt piese de rezistenta ale oricarui loc de joaca de exterior, fiind adorate de copiii din toate categoriile de varsta. Fie ca sunt inspirate din stilul clasic sau cel modern, acestea reprezinta o tentatie pentru orice copil, un prilej de joaca, distractie, socializare.',
                'order' => 999,
                'picture' => 'leaves.jpg',
                'active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Carusele',
                'main_category_id' => NULL,
                'slug' => 'carusele',
                'keywords' => 'carusele, jocuri copii',
                'description' => 'Caruselele reprezinta o parte clasica a locurilor de joaca. Dintotdeauna copiilor le-a placut sa se invarta, sa “zboare” alaturi de prietenii lor, iar caruselele le ofera aceasta fantezie datorita formelor in care sunt realizate si a confortului pe care il confera.',
                'order' => 999,
                'picture' => 'shoes.jpg',
                'active' => 1,
            ),
        ));
        
        
    }
}