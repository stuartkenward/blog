<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use App\User;
use App\Comments;

class BlogPostDetailController extends Controller
{
    public function index($post){
        
        $post = BlogPost::findOrFail($post);
        $user = User::findOrFail($post->user_id);
        $comments = Comments::where('blog_post_id', '=', $post->id)->get();

        return view("blogPostDetail", [
            'post' => $post,
            'user' => $user,
            'comments' => $comments
        ]);
    }
}
