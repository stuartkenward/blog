<?php

namespace App\Http\Controllers;

use App\BlogPosts;
use App\Comments;

class BlogPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $posts = BlogPosts::orderBy('created_at','desc')->paginate(5);

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

        $imagePath = request('image')->store('uploads', 'public');

        auth()->user()->blogPosts()->create([
            'title' => $data['title'],
            'body' => $data['body'],
            'exerpt' => $data['exerpt'],
            'numberOfComments' => "0",
            'image' => $imagePath
        ]);

        return redirect('/');
    }
}
