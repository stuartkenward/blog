@extends('layouts.app')

@section('content')

<form action="/c/edit/{{$comment->id}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row">
        <div class="col-8 offset-2">
            <div class="form-group row">
            <textarea id="body" class="form-control" name="body" rows="5" cols="40" required autocomplete="body" autofocus>{{$comment->body}}</textarea>
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
            <button class="btn btn-primary">Edit Comment</button>
        </div>
    </div>
</form>

@endsection