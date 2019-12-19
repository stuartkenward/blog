<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;
use App\BlogPost;
use App\Comments;

class BlogPostsController extends Controller
{
    public function index(){

        $posts = BlogPosts::orderBy('created_at','desc')->paginate(5);
        $user = auth()->user();
        $loggedIn = auth()->check();

        foreach($posts as $post){
            $post->number_of_comments = Comments::where('blog_post_id', '=', $post->id)->get()->count();
            $post->save();
        }

        return view("home", [
            'posts' => $posts,
            'user' => $user,
            'loggedIn' => $loggedIn
        ]);
    }

    public function create(){

        if (auth()->check()){
            return view('posts.create');
        }
    
        return redirect('/');
    }

    public function store(){
        
        if (auth()->check()){
            $data =request()->validate([
                'title' => 'required',
                'body' => 'required',
                'image' => ['required','image'],
                'exerpt' => 'required'
            ]);

            $imagePath = request('image')->store('uploads', 'public');

            auth()->user()->blogPosts()->create([
                'title' => $data['title'],
                'body' => $data['body'],
                'exerpt' => $data['exerpt'],
                'number_of_comments' => "0",
                'posted_by' => auth()->user()->name,
                'image' => $imagePath
            ]);
        }

        return redirect('/');
    }

    public function edit($id){
        $post = BlogPost::find($id);
        $this->authorize('update', $post);
        return view('posts.edit')->with('post', $post);
    }

    public function update($id){
        $post = BlogPost::find($id);
        $imagePath = request('image')->store('uploads', 'public');

        $this->authorize('update', $post);
        $post->title = request()->input('title');
        $post->body = request()->input('body');
        $post->exerpt = request()->input('exerpt');
        $post->image = $imagePath;
        $post->save();

        return redirect('/')->with('success','Post Edited');
    }

    public function delete($id){
        $post = BlogPost::find($id);
        $this->authorize('delete', $post);
        $post->delete();
        return redirect('/')->with('success','Post Deleted');
    }
}
