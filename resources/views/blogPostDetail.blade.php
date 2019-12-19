@extends('layouts.app')

@section('content')

<div style="padding-top: 16px"></div>
<div class="container">
    <div class="col-12" style="
        background: #FFFFFF; 
        canvas: #DAE0E6; 
        display: block; 
        border-radius: 4px; 
        cursor: pointer; 
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; 
        transition: color .5s,fill .5s,box-shadow .5s;">
        <div>
            <h1>{{$post->title}}</h1>
            <div>
            <h4>{{$post->body}}</h3>
            </div>
            <div>
                <div>{{$user->name}}</div>
            </div>
        </div>
    </div>

    <div class="pt-2">
        <form action="/c" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                            <textarea id="body" class="form-control" name="body" rows="5" cols="40"></textarea>
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

        @foreach ($comments as $comment)
            <div class="container" style="
            background: #FFFFFF; 
            canvas: #DAE0E6; 
            display: block; 
            border-radius: 4px; 
            cursor: pointer; 
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; 
            transition: color .5s,fill .5s,box-shadow .5s;">
                <div>
                    {{$comment->body}}
                </div>
            </div>
        @endforeach
    </div>
</div>



@endsection