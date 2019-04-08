<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(NewslettersTableSeeder::class);
        $this->call(AnalyticsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
