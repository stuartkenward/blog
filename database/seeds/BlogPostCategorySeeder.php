<?php

use Illuminate\Database\Seeder;

use App\BlogPosts;
use App\Categories;
use App\BlogPostCategory;

class BlogPostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $posts = BlogPosts::all();
        $categories = Categories::all();

        foreach($posts as $post){
            for($i=1; $i<rand(1, $categories->count()); $i++ ) {
                BlogPostCategory::create([
                    'blog_post_id' => $post->id,
                    'category_id' => $categories[$i]->id
                ]);
            }
        }
    }
}