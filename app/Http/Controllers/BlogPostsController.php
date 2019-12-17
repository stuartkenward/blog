<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;

class BlogPostsController extends Controller
{
    public function index(){

        $posts = BlogPosts::paginate(10);

        return view("home", [
            'posts' => $posts
        ]);
    }
}
