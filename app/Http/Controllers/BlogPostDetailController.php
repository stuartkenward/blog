<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use App\User;
use App\Comment;

class BlogPostDetailController extends Controller
{
    public function index($post){
        
        $post = BlogPost::find($post);
        $user = User::find($post->user_id);

        return view("blogPostDetail", [
            'post' => $post,
            'user' => $user
        ]);
    }
}
