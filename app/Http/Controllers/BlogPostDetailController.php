<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use App\User;
use App\Comments;
use App\Comment;
use Illuminate\Support\Facades\Redirect;

class BlogPostDetailController extends Controller
{
    public function index($post){
        
        $post = BlogPost::findOrFail($post);
        $user = User::findOrFail($post->user_id);
        $comments = Comments::where('blog_post_id', '=', $post->id)->get();
        $categories = $post->categories;
        $loggedIn = auth()->check();

        return view("blogPostDetail", [
            'post' => $post,
            'user' => $user,
            'comments' => $comments,
            'categories' => $categories,
            'loggedIn' => $loggedIn
        ]);
    }
    public function store($post){
        
        $data =request()->validate([
            'body' => 'required'
        ]);


        auth()->user()->comments()->create([
            'body' => $data['body'],
            'blog_post_id' => $post,
            'posted_by' => auth()->user()->name
        ]);

        return Redirect::back();
    }

    public function edit($id){
        $comment = Comment::find($id);
        $this->authorize('update', $comment);
        return view('comments.edit')->with('comment', $comment);
    }

    public function update($id){

        $comment = Comment::find($id);
        $this->authorize('update', $comment);
        $comment->body = request()->input('body');
        $comment->save();
        return redirect('/post/'.$comment->blog_post_id);

    }

    public function delete($id){
        $comment = Comment::find($id);
        $this->authorize('delete', $comment);
        $comment->delete();
        return Redirect::back()->with('success','Post Deleted');
    }
}
