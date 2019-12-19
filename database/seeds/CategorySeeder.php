<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => "Laravel"]);
        Category::create(['name' => "Happy"]);
        Category::create(['name' => "Strange"]);
        Category::create(['name' => "Banana"]);
        Category::create(['name' => "Hula-hoop"]);
    }
}