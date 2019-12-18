@extends('layouts.app')

@section('content')

<div class="container">
    <form action="" >
        <div class="row">
            <div class="col-8 offset-2">
            <div class="row">
                <h1>Add New Post</h1>
            </div>
                <div class="form-group row">
                    <label for="body" class="col-md-4 col-form-label">Body</label>

                        <textarea id="body" class="form-control" name="body" rows="10" cols="40"></textarea>
            
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="exerpt" class="col-md-4 col-form-label">Exerpt</label>

                        <textarea id="exerpt" class="form-control" name="exerpt" rows="5" cols="40"></textarea>
            
                        @error('exerpt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
            <label for="image" class="col-md-4 col-form-label">Post Image</label>
            <input type="file", class="form-control-file" id="image" name="image"/>
            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
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