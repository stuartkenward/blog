@extends('layouts.app')

@section('content')

<div style="padding-top: 16px"></div>
<div class="container" style=" style=box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; ">
    <div class="col-12" style="
        text-align: center;
        background: #FFFFFF; 
        canvas: #DAE0E6; 
        display: block; 
        border-radius: 4px; 
        transition: color .5s,fill .5s,box-shadow .5s;">
        <div >
            <h1 style="font-family: futura-pt;
            font-weight: 400;
            font-style: normal;
            font-size: 30px;
            letter-spacing: 0em;
            line-height: 1.5em;
            text-transform: none;
            color: #3b4b7f;
            -webkit-box-ordinal-group: 2;">{{$post->title}}</h1> 
            
            @foreach ($categories as $category)
            <div class="btn btn-" style="margin: 5px">{{$category->name}}</div>
            @endforeach

            <div>Posted by {{$user->name}}</div>
            
            <img src="/storage/{{$post->image}}" alt="" style="width:auto; max-height: 540px; align: center;">
            <div style="font-family: proxima-nova;
            font-weight: 400;
            font-style: normal;
            font-size: 15px;
            letter-spacing: .02em;
            line-height: 2em;
            text-transform: none;
            color: #757575;">{{$post->body}}</div>
            
            <div class="d-flex pt-2" style="align-items: flex-end; float: right;">
                @can('update', \App\BlogPost::find($post->id))
                <form action="/p/edit/{{$post->id}}" enctype="multipart/form-data" method="get">
                    @csrf
                            <button class="btn btn-secondary" >Edit post</button>
                </form>
                @endcan
                @can('delete', \App\BlogPost::find($post->id))
                <form action="/p/delete/{{$post->id}}" enctype="multipart/form-data" method="post">
                    @csrf
                            <button class="btn btn-danger">Delete post</button>
    
                </form>
                @endcan
            </div>
        </div>
        
    </div>

    <div class="container pt-2" style="box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; 
    ">
        <h2>Comments</h2>
        @foreach ($comments as $comment)
        <div class="pt-2">
            <div class="container" style="
            background: #FFFFFF; 
            canvas: #DAE0E6; 
            display: block; 
            border-radius: 4px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;" >
                <div>
                    <h4 style="font-family: proxima-nova;
                    font-weight: 400;
                    font-style: normal;
                    font-size: 15px;
                    letter-spacing: .02em;
                    line-height: 2em;
                    text-transform: none;
                    color: #757575;">{{$comment->body}}</h4>
                </div>
                <div class="d-flex justify-content-between">
                    <div style="font-family: proxima-nova;
                    font-weight: 400;
                    font-style: normal;
                    font-size: 13px;">
                        Posted by {{$comment->posted_by}}
                    </div>
                    <div style="float: right;">
                        <div class="d-flex pt-2" style="align-items: flex-end; float: right;">
                        @can('update', \App\Comment::find($comment->id))
                        <form action="/c/edit/{{$comment->id}}" enctype="multipart/form-data" method="get">
                            @csrf
                                    <button class="btn btn-secondary">Edit comment</button>
                        </form>
                        @endcan
                        @can('delete', \App\Comment::find($comment->id))
                        <form action="/c/delete/{{$comment->id}}" enctype="multipart/form-data" method="post">
                            @csrf
                                    <button class="btn btn-danger">Delete comment</button>
        
                        </form>
                        </div>
                        @endcan
                    </div>
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