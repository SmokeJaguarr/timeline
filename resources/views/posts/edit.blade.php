@extends('layouts.app')

@section('content')



<div class="container">
    <form action="/posts/{{$post->id}}" enctype="form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offser-2">

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>


                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title}}" required autocomplete="title">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>


                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $post->description }}" required autocomplete="description">

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="type" class="col-md-4 col-form-label">Type</label>


                    <select id="type" name="type" class="form-control">

                        <option value="News" {{ $post->type == "News" ? 'selected' : '' }}>News</option>
                        <option value="Article" {{ $post->type == "Article" ? 'selected' : '' }}>Article</option>
                        <option value="Press-release" {{ $post->type == "Press-release" ? 'selected' : '' }}>Press-release</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>





                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection