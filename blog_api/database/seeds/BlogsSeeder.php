<?php

use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $blogs = new App\Blogs();
        $blogs->user_id = rand(1, 10);
        $blogs->body = 'Dragon slayer 84';
        $blogs->title = 'admin';
        $blogs->save();
    }
}
