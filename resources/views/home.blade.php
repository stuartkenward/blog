@extends('layouts.app')

@section('content')

<div class="py-4">
<div class="container">
    <div class="container" style="
        border-radius: 4px;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        background: #FFFFFF; 
        padding-top: 16px">

    <div class="">
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <select name="sortBy">
            <option value="DateNew">Date new to old</option>
            <option value="DateOld">Date old to new</option>
            <option value="Popularity">Popularity</option>
        </select>
        <select name="sortByCategory">
            <option value="Category1">Category 1</option>
            <option value="Category2">Category 2</option>
            <option value="Category3">Category 3</option>
        </select>     
    </div>

@foreach ($posts as $post)
    <div class="col-12" style="
    background: #FFFFFF; 
    canvas: #DAE0E6; 
    display: block; 
    border-radius: 4px; 
    cursor: pointer; 
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; 
    transition: color .5s,fill .5s,box-shadow .5s;
    padding-top: 16px">
    <a href="/post/{{$post->id}}" style="display: block;">
        <div>
            <h1>{{$post->title}}</h1>
            <div>
            <h4>{{$post->exerpt}}</h3>
            </div>
        </div>
    </a>
    </div>
@endforeach

    
</div>
</div>
</div>
@endsection