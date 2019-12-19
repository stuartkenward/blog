@extends('layouts.app')

@section('content')

<div >
    <div class="container py-2">
        <div style="text-align: center;">
            <h1>The Super Blog</h1>
            @if ($loggedIn)
                <a href="/p/create" class="btn btn-primary">Add new post</a> 
            @endif
        </div>
    </div>
</div>
    

<div class="py-2">
@foreach ($posts as $post)
<div class="py-2">
    <div class="container" style="
    background: #FFFFFF; 
    canvas: #DAE0E6; 
    display: block; 
    border-radius: 4px; 
    cursor: pointer; 
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; 
    transition: color .5s,fill .5s,box-shadow .5s;
    padding-top: 16px">
        
        <?php
            $post = \App\BlogPost::find($post->id);
            $categories = $post->categories;
        ?>
        
        <a href="/post/{{$post->id}}" style="display: block; color: #000000; text-decoration: none">
            <div style="text-align: center;">
                    <h1 style="font-family: futura-pt;
                    font-weight: 400;
                    font-style: normal;
                    font-size: 30px;
                    letter-spacing: 0em;
                    line-height: 1.5em;
                    text-transform: none;
                    color: #3b4b7f;
                    -webkit-box-ordinal-group: 2;">{{$post->title}}</h1>
                    <div>
                            @foreach ($categories as $category)
                            <div class="btn btn-" style="background-color:#757575">{{$category->name}}</div>
                            @endforeach
                        <div>Posted by {{$post->posted_by}}</div>
                    </div>
                    <img src="/storage/{{$post->image}}" alt="" style="width:auto;max-height: 540px;">
                <div>
                <h4 style="font-family: proxima-nova;
                font-weight: 400;
                font-style: normal;
                font-size: 15px;
                letter-spacing: .02em;
                line-height: 2em;
                text-transform: none;
                color: #757575;">{{$post->exerpt}}</h3>
                </div>
            </div>
        </a>
        <h5 style="text-align: right">{{$post->number_of_comments}} comments</h5>
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                @can('update', \App\BlogPost::find($post->id))
                    <form action="/p/edit/{{$post->id}}" enctype="multipart/form-data" method="get">
                        @csrf
                                <button class="btn btn-secondary">Edit post</button>
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
</div>
@endforeach
<div class="container">
    <div style="display: flex;
    align-items: center;
    justify-content: center;">
        {{ $posts->links() }}
    </div>
</div>

</div>
    
</div>
</div>
@endsection