@extends('layouts.app')

@section('content')




<div class="content">

    <div class="container">

        @if (Auth::check())
        <div class="d-flex flex-row"><a href='/posts/create'><button type="button" class="btn btn-outline-success">Add Post</button></a>
            <a href='/myposts' class="pl-1"><button type="button" class="btn btn-outline-primary">My posts</button></a></div>
        @else
        @endif

        <label class="d-flex flex-row">Filter by Author e-mail</label>
        <div class="input-group pb-3">
            <form action="/" enctype="form-data" method="get" class="d-flex flex-row">
                <input type="email" name="searchemail" class="form-control" style="size:1" placeholder="Enter email">
                <span class="input-group-btn pl-1">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </form>
            <a href="/" class="pl-1"><button type="submit" class="btn btn-primary">Reset Email Filter</button></a>
        </div>

        <a class="d-flex flex-row">
            <h2>Published Timeline Posts</h2>
        </a>

        <div class="row">
            <ul class="timeline">
                @foreach($posts as $post)
                <li>
                    <a target="_blank" href="/posts/{{ $post->id }}">
                        <p class="text-left">{{$post->title}}</p>
                    </a>
                    <!--                     <a href="/posts/{{ $post->id }}" class="float-right">{{$post->created_at}}</a>
                    <p>{{$post->type}}</p> -->
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


@endsection