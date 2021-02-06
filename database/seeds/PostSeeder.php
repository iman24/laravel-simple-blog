<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Post;
        $p->title = "Hello ini post pertama saya";
        $p->slug = Str::kebab("Hello ini post pertama saya");
        $p->content = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum sequi repudiandae accusamus numquam iste commodi praesentium recusandae nam, magnam quis consectetur eligendi. Itaque at ipsa neque, officia vitae praesentium iusto.";
        $p->category_id = 1;
        $p->save();
    }
}
