@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-sm-6 pb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Overview</h5>
                    <p class="card-text"><b>Title :</b> {{ $post->title}} </p>
                    <p class="card-text"><b>Description :</b> {{ $post->description}} </p>
                    <p class="card-text"><b>Type :</b> {{ $post->type}} </p>
                    <p class="card-text"><b>Created At :</b> {{ $post->created_at}} </p>
                    <p class="card-text"><b>Updated At :</b> {{ $post->updated_at}} </p>

                    <a href="/" class=""><button class="btn btn-primary">To Timeline</button></a>

                    @can('update', $post)
                    <post-button post-id="{{ $post->id }}" published="{{ $published }}"></post-button>

                    <a href="/posts/{{ $post->id }}/edit" class="float-right pr-2"><button class="btn btn-primary">Edit</button></a>
                    <form action="/posts/delete/{{$post->id}}" enctype="form-data" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>

    </div>
</div>

@endsection