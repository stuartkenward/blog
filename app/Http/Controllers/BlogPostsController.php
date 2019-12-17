<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;

class BlogPostsController extends Controller
{
    public function index(){

        $posts = BlogPosts::all();

        return view("home", [
            'posts' => $posts
        ]);
    }
}
