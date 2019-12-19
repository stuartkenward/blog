@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        

        <div class="row">
            <div class="col-8 offset-2">
            <div class="row">
                <h1>Add New Post</h1>
            </div>
            <div class="row">
                <label for="title" class="col-md-4 col-form-label">Post title</label>
                <input type="text", class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autocomplete="title" autofocus/>
                @error('title')
                                    <strong>{{ $message }}</strong>
                            @enderror
            </div>
                <div class="form-group row">
                    <label for="body" class="col-md-4 col-form-label">Body</label>
                        <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" rows="10" cols="40" required autocomplete="body" autofocus></textarea>
            
                        @error('body')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="exerpt" class="col-md-4 col-form-label">Exerpt</label>

                        <textarea id="exerpt" class="form-control @error('exerpt') is-invalid @enderror" name="exerpt" rows="5" cols="40" required autocomplete="title" autofocus></textarea>
            
                        @error('exerpt')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
            <label for="image" class="col-md-4 col-form-label">Post Image</label>
            <input type="file", class="form-control-file" id="image" name="image"/>
            @error('image')
                                <strong>{{ $message }}</strong>
                        @enderror
                    </div>
        </div>

        <div class="row pt-4">
            <div class="col-8 offset-2">
                <button class="btn btn-primary">Add New Post</button>
            </div>
        </div>
    </form>
</div>



@endsection