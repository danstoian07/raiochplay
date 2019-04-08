<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'name' => 'Exemplu Produs',
                'code' => '123456',
                'slug' => 'exemplu-produs',
                'description' => '<p>In aceasta zona este descrierea produsului.</p><p>Descrierea poate fi <strong>formatata</strong> dupa necesitati.</p>',
                'materials' => '<p>Aici enumeram materialele din care este construit produsul:</p><ul><li>material principal</li><li>material secundar</li><li>extra material</li></ul>',
                'thumb' => 'prod_1.jpg',
                'views' => 0,
                'active' => 1,
                'created_at' => '2018-05-15 14:57:51',
                'updated_at' => '2018-05-15 14:58:16',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 1,
                'name' => 'Inca un produs',
                'code' => '4567889',
                'slug' => 'inca-un-produs',
                'description' => '<p>Descriere in latina:</p><p>Dignissimos faucibus aenean semper ridiculus assumenda nostrud varius accusamus curabitur cumque dolor occaecat magnis repellat esse metus corrupti.</p>',
                'materials' => '<p>Dignissimos faucibus aenean semper ridiculus assumenda nostrud varius accusamus curabitur cumque dolor occaecat magnis repellat esse metus corrupti</p>',
                'thumb' => 'leagan_1.jpg',
                'views' => 0,
                'active' => 1,
                'created_at' => '2018-05-15 14:59:30',
                'updated_at' => '2018-05-15 15:10:15',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 1,
                'name' => 'O casuta',
                'code' => '45741',
                'slug' => 'o-casuta',
                'description' => '<p>Hic debitis, nullam ipsam pulvinar odio lorem lacus potenti, ad. Fermentum? Convallis, eros cumque inceptos placerat voluptatum, dolorum iusto, iste? Ornare, fames venenatis quae lacus itaque, molestiae mollit lectus? Posuere, accusamus optio torquent urna ultrices! Ornare!</p>',
                'materials' => '<p>Diamlorem litora hendrerit occaecat, nullam maxime quod numquam justo repellat numquam accusantium, similique nesciunt do unde mattis asperiores, integer odio! Minus torquent volutpat, pellentesque molestie? Purus, quae posuere.</p>',
                'thumb' => 'casuta_1.jpg',
                'views' => 0,
                'active' => 1,
                'created_at' => '2018-05-15 15:04:56',
                'updated_at' => '2018-05-15 15:05:42',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 2,
                'name' => 'Nume Produs',
                'code' => '1211',
                'slug' => 'nume-produs',
                'description' => '<p>Laboriosam volutpat beatae occaecati alias eros minus pulvinar laoreet, quo minus ut proin ipsa! Habitant vestibulum felis ornare cum ut, optio, gravida venenatis placerat.</p><p>Laboriosam volutpat beatae occaecati alias eros minus pulvinar laoreet, quo minus ut proin ipsa! Habitant vestibulum felis ornare cum ut, optio, gravida venenatis placerat.</p>',
                'materials' => '<p>Laboriosam volutpat beatae occaecati alias eros minus pulvinar laoreet, quo minus ut proin ipsa! Habitant vestibulum felis ornare cum ut, optio, gravida venenatis placerat</p>',
                'thumb' => '2_csute.jpg',
                'views' => 0,
                'active' => 1,
                'created_at' => '2018-05-15 15:12:32',
                'updated_at' => '2018-05-15 15:12:39',
            ),
        ));
        
        
    }
}