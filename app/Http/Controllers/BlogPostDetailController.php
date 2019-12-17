<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostDetailController extends Controller
{
    public function index($post){
        dd($post);
        return view("blogPostDetail");
    }
}
