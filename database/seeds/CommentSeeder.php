<?php

use Illuminate\Database\Seeder;
use App\Comment;
use Faker\Provider\ar_SA\Color;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment;
        $c->name = "Iman Nurzaman";
        $c->content = "Hallo ini contoh komentar";
        $c->url = "https://www.imanancin.com";
        $c->email = "admin@imanancin.com";
        $c->post_id = 1;
        $c->save();

    }
}
