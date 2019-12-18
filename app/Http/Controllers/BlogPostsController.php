<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;
use App\Comments;

class BlogPostsController extends Controller
{
    public function index(){

        $posts = BlogPosts::paginate(10);

        foreach($posts as $post){
            $post->numberOfComments = Comments::where('blog_post_id', '=', $post->id)->get()->count();
        }

        return view("home", [
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('posts.create');
    }
}
