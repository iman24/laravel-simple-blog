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
        $c = new Category;
        $c->name = "Uncategorized";
        $c->slug = "uncategorized";
        $c->save();
    }
}
