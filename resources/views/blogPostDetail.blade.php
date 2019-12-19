@extends('layouts.app')

@section('content')

<div style="padding-top: 16px"></div>
<div class="container">
    <div class="col-12" style="
        background: #FFFFFF; 
        canvas: #DAE0E6; 
        display: block; 
        border-radius: 4px; 
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; 
        transition: color .5s,fill .5s,box-shadow .5s;">
        <div>
            <h1>{{$post->title}}</h1> 
            <h4>{{$post->body}}</h3>
            <div style="text-align:right">Posted by {{$user->name}}</div>
        </div>
        <div class="d-flex">
            <form action="/p/edit/{{$post->id}}" enctype="multipart/form-data" method="get">
                @csrf
                        <button class="btn btn-secondary">Edit post</button>
            </form>
            <form action="/p/delete/{{$post->id}}" enctype="multipart/form-data" method="post">
                @csrf
                        <button class="btn btn-danger">Delete post</button>

            </form>
        </div>
    </div>

    <div class="pt-2">
        <h2>Comments</h2>
        @foreach ($comments as $comment)
        <div class="pt-2">
            <div class="container" style="
            background: #FFFFFF; 
            canvas: #DAE0E6; 
            display: block; 
            border-radius: 4px; 
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; 
            transition: color .5s,fill .5s,box-shadow .5s;">
                <div>
                    <h4>{{$comment->body}}</h4>
                </div>
                <div style="text-align:right">
                    Posted by {{$comment->posted_by}}
                </div>
                <div class="d-flex">
                    <form action="/c/edit/{{$comment->id}}" enctype="multipart/form-data" method="get">
                        @csrf
                                <button class="btn btn-secondary">Edit comment</button>
                    </form>
                    <form action="/c/delete/{{$comment->id}}" enctype="multipart/form-data" method="post">
                        @csrf
                                <button class="btn btn-danger">Delete comment</button>
    
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pt-2">
        <form action="/c/{{$post->id}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                            <textarea id="body" class="form-control" name="body" rows="5" cols="40" required autocomplete="body" autofocus></textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
            </div>
            
            <div class="row pt-2">
                <div class="col-8 offset-2">
                    <button class="btn btn-primary">Add New Comment</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection