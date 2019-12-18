<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;
use App\Comments;
use App\BlogPost;
use App\User;

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

    public function store(){
        
        $data =request()->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => '',
            'exerpt' => 'required'
        ]);

        auth()->user()->blogPosts()->create($data);

        dd(request()->all());
    }
}
