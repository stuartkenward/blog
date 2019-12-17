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
</div>



@endsection