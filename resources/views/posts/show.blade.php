@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-sm-6 pb-4">
            <div class="card">
                <div class="card-body">
                    @can('update', $post)
                    <form action="/posts/delete/{{$post->id}}" enctype="form-data" method="post">
                        @csrf
                        <a class="float-right pr-2"><button type="submit" class="btn btn-outline-danger">Delete</button></a>
                        <a href="/posts/{{ $post->id }}/edit" class="float-right pr-2"><button type="button" class="btn btn-outline-success">Edit</button></a>
                    </form>
                    @endcan
                    <h5 class="card-title">Overview</h5>
                    <p class="card-text"><b>Title :</b> {{ $post->title}} </p>
                    <p class="card-text"><b>Description :</b> {{ $post->description}} </p>
                    <p class="card-text"><b>Type :</b> {{ $post->type}} </p>
                    <p class="card-text"><b>Created At :</b> {{ $post->created_at}} </p>
                    <p class="card-text"><b>Updated At :</b> {{ $post->updated_at}} </p>

                    <div class="d-flex flex pb-1"><a href='/'><button type="button" class="btn btn-outline-primary">To Timeline</button></a>
                        <a href='/myposts' class="pl-1"><button type="button" class="btn btn-outline-primary">To MyPosts</button></a></div>

                    @can('update', $post)
                    <post-button post-id="{{ $post->id }}" published="{{ $published }}"></post-button>

                    @endcan
                </div>
            </div>
        </div>

    </div>
</div>

@endsection